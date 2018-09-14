<?php
namespace Gallery\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Croogo\Core\Model\Table\CroogoTable;
use Cake\Utility\Text;
use Cake\Utility\Inflector;
use Cake\Core\Configure;

class PhotosTable extends CroogoTable
{
    public $serverPath = false;

    public $allowed_extensions = array( 'jpg', 'jpeg', 'png', 'gif' );

    protected $_cacheServerPath = false;

    public $sizes = false;

    public $cacheDir = 'resized';

    public $uploadsDir = 'uploads';

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('photos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
            'className' => 'Gallery.Albums'
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always',
                ],
            ],
        ]);
        $this->addBehavior('Croogo/Core.Trackable');

        $this->addBehavior('CounterCache', [
            'Albums' => ['photo_counter'],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    public function deletePhoto($id = null)
    {
       $entity = $this->get($id);
       $this->delete($entity);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['album_id'], 'Albums'));

        return $rules;
    }

    public function saveFile($file = null) {
        $data = false;
        if (isset($file['tmp_name'])) {
            $data = $this->_saveUploadedFile($file);
        }
        if (!$data) {
            return false;
        }

        return $this->save( $data );
    }

    /**
     * Save uploaded file
     *
     * @param $file file as POSTed from form
     * @return bool|\Cake\Datasource\EntityInterface false for errors or array containing fields to save
     */
    protected function _saveUploadedFile( $file ) {
        $photo = $this->newEntity();

        $extensions = '';
        if (explode('.', $file['name']) > 0) {
            $fileTitleE = explode('.', $file['name']);
            $extensions = end($fileTitleE);
            array_pop($fileTitleE);
            $fileTitle = implode('.', $fileTitleE);
        } else {
            $fileTitle = $file['name'];
        }

        $newFileName = Text::uuid() . '-' . $fileTitle;
        $newSafeFileName = Inflector::slug($newFileName).'.'.$extensions;
        $destination = WWW_ROOT . $this->uploadsDir . DS . $newSafeFileName;

        $photo->name = $fileTitle;
        $photo->mime = $file['type'];
        $photo->path = '/' . $this->uploadsDir . '/' . $newSafeFileName;

        $moved = move_uploaded_file($file['tmp_name'], $destination);

        if( $extensions != '' && in_array( $extensions, $this->allowed_extensions ) ) {
            $photo->thumbnail = $this->source($this->uploadsDir . '/' . $newSafeFileName)->crop(200, 150)->imagePath();
        } else {
            $photo->thumbnail = '';
        }

//        $photo->thumbnail = WWW_ROOT . $this->uploadsDir . '/' . $newSafeFileName;
//        $photo->thumbnail = $this->sizes;

        if ($moved) {
            return $photo;
        }

        return false;
    }

    /**
     * Load image
     *
     * @param string $path Path to image relative to webroot
     * @param boolean $absolute Path is absolute server path
     * @return object $this
     */
    public function source($path = '', $absolute = false) {
        $this->sizes = false;
        $this->serverPath = false;
        $this->_cacheServerPath = false;

        if (!$absolute) {
            $path = WWW_ROOT . $path;
        }

        if ($this->sizes = @getimagesize($path)) {
            $this->serverPath = $path;
        }

        return $this;
    }

    public function crop($width, $height, $resize = true) {

        if ($this->_cacheServerPath) {
            $this->source($this->_cacheServerPath, true);
        }
        if ($resize) {
            $ratio_x = $width / $this->sizes[0];
            $ratio_y = $height / $this->sizes[1];
            if (($ratio_y) > ($ratio_x)) {
                $start_x = round(($this->sizes[0] - ($width / $ratio_y)) / 2);
                $start_y = 0;
                $this->sizes[0] = round($width / $ratio_y);
            } else {
                $start_x = 0;
                $start_y = round(($this->sizes[1] - ($height / $ratio_x)) / 2);
                $this->sizes[1] = round($height / $ratio_x);
            }
        } else {
            $start_x = intval(($this->sizes[0] - $width) / 2);
            $start_y = intval(($this->sizes[1] - $height) / 2);
            $this->sizes[0] = $width;
            $this->sizes[1] = $height;
        }
        $this->_nativeResize($start_x, $start_y, $width, $height, 'crop');
        return $this;
    }

    /**
     * Resample or resize and cache
     *
     * @param int $start_x;
     * @param int $start_y;
     * @param int $width;
     * @param int $height
     * @return void
     */
    protected function _nativeResize($start_x, $start_y, $width, $height, $method = 'na') {

        $cache_dir = Configure::read('Image2.cacheDir');
        $cache_dir = WWW_ROOT . $cache_dir . DS;

        $cache_path = $cache_dir . implode('_', array($start_x, $start_y, $width, $height, $method, basename($this->serverPath)));
        if (file_exists($cache_path)) {
            if (@filemtime($cache_path) >= @filemtime($this->serverPath)) {// check if up to date
                $this->_cacheServerPath = $cache_path;
                $this->sizes = @getimagesize($cache_path);
            }
        }
        if (!$this->_cacheServerPath) {
            $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
            $image = call_user_func('imagecreatefrom' . $types[$this->sizes[2]], $this->serverPath);
            if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor($width, $height))) {
                if (function_exists('imagecolorallocatealpha')) {
                    imagealphablending($temp, false);
                    imagesavealpha($temp, true);
                    $transparent = imagecolorallocatealpha($temp, 255, 255, 255, 127);
                    imagefilledrectangle($temp, 0, 0, $this->sizes[0], $this->sizes[1], $transparent);
                    imagecopyresampled($temp, $image, 0, 0, $start_x, $start_y, $width, $height, $this->sizes[0], $this->sizes[1]);
                } else {
                    imagecolortransparent($temp, imagecolorallocate($temp, 0, 0, 0));
                    imagecopyresampled($temp, $image, 0, 0, $start_x, $start_y, $width, $height, $this->sizes[0], $this->sizes[1]);
                }
            } else {
                $temp = imagecreate($width, $height);
                imagecopyresized($temp, $image, 0, 0, $start_x, $start_y, $width, $height, $this->sizes[0], $this->sizes[1]);
            }

            $temp = imagerotate($temp, array_values([0, 0, 0, 180, 0, 0, -90, 0, 90])[@exif_read_data($this->serverPath)['Orientation'] ?: 0], 0);

            if (call_user_func("image" . $types[$this->sizes[2]], $temp, $cache_path)) {
                imagedestroy($image);
                imagedestroy($temp);
                $this->_cacheServerPath = $cache_path;
                $this->sizes = @getimagesize($cache_path);
            }
        }
    }

    public function imagePath() {
        $cache_dir = Configure::read('Image2.cacheDir');
        return $cache_dir.'/'.basename($this->_cacheServerPath);
    }
}

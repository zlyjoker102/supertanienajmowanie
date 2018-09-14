<?php

namespace Gallery\Controller\Admin;

use Croogo\Core\Controller\Admin\AppController as CroogoController;
use Cake\Event\Event;

/**
 * Example Controller
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 * @property PhotosTable $Photos
 */
class GalleryController extends CroogoController
{
    public function initialize() {
        parent::initialize();

        $this->modelClass = 'Gallery.Albums';

        $this->Crud->addListener('relatedModels', 'Crud.RelatedModels');

        $this->Crud->config('actions.index', [
            'displayFields' => $this->Albums->displayFields(),
            'searchFields' => ['title']
        ]);
        $this->Crud->config('actions.edit', [
            'editFields' => $this->Albums->editFields(),
            'relatedModels' => ['Photos']
        ]);

        $this->loadModel('Gallery.Photos');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->getEventManager()->off($this->Csrf);
        if (in_array($this->request->getParam('action'), ['upload'])) {
            $this->getEventManager()->off($this->Csrf);
        }

        $this->Security->setConfig('unlockedActions', ['upload', 'add', 'edit']);
    }

    public function edit($id)
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Photos']);
        });

        return $this->Crud->execute();
    }

    public function delete($id = null)
    {
        $this->loadModel('Photos');
        $this->Photos->deletePhoto($id);
    }

    public function upload() {
        if ( count( $_FILES ) > 0 ) {

            foreach( $_FILES as $file ) {
                if( isset($file['tmp_name'] ) &&
                    is_uploaded_file( $file['tmp_name'] )) {
                    if( $result = $this->Photos->saveFile( $file ) ) {
//                        $media = $this->Photos->findById( $this->Media->id );
                        echo json_encode( array(
                            "success" => true,
                            "uuid" => isset($_POST['qquuid'])?$_POST['qquuid']:null,
                            "media_id" => $result->id,
                            "thumbnail" => $result->thumbnail,
                            "full" => $result->path
                        ));
                    } else {
                        echo json_encode( array('error'=> 'Could not save uploaded file.' .
                            'The upload was cancelled, or server error encountered'));
                    }
                } else {
                    echo json_encode( array('error'=> 'Could not save uploaded file.' .
                        'The upload was cancelled, or server error encountered'));
                }
            }
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
        exit();
    }
}

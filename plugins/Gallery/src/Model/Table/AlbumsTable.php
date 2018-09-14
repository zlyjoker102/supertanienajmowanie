<?php
namespace Gallery\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Croogo\Core\Model\Table\CroogoTable;

class AlbumsTable extends CroogoTable
{

    protected $_displayFields = [
        'title',
        'photo_counter' => ['label' => 'Liczba zdjęć'],
        'status' => ['type' => 'boolean'],
    ];

    protected $_editFields = [
        'title',
        'slug',
        'description',
        'author',
        'status',
    ];

    public $filterArgs = [
        'title' => ['type' => 'like', 'field' => ['Albums.title']],
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('albums');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');

        $this->hasMany('Photos', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
            'className' => 'Gallery.Photos'
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


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->existsIn(['game_id'], 'Photos'));
//
//        return $rules;
//    }
}
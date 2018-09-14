<?php

namespace Gallery\Controller;

use Croogo\Core\Controller\AppController as CroogoController;

class GalleryController extends CroogoController
{
    public function initialize() {
        parent::initialize();

        $this->modelClass = 'Gallery.Albums';
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $query = $this->Albums->find('all', [
            'status' => 1,
            'contain' => ['Photos']
        ]);
        $galleries = $this->paginate($query);

        $this->set('title_for_layout', 'Galerie');
        $this->set([
            'galleries' => $galleries
        ]);
    }

}

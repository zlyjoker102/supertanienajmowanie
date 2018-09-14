<?php

namespace Gallery\Config;

use Croogo\Core\Nav;

Nav::add('sidebar', 'gallery', [
    'icon' => 'photo',
    'title' => __d('croogo', 'Galerie', ''),
    'url' => [
        'prefix' => 'admin',
        'plugin' => 'Gallery',
        'controller' => 'Gallery',
        'action' => 'index',
    ],
]);
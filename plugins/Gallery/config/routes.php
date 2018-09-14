<?php
use Cake\Routing\RouteBuilder;
use Croogo\Core\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin( 'Gallery', ['path' => '/gallery'], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});

Router::plugin('Gallery', ['path' => '/'], function (RouteBuilder $route) {
    $route->prefix('admin', function (RouteBuilder $route) {
        $route->extensions(['json']);

        $route->scope('/gallery', [], function (RouteBuilder $route) {
            $route->fallbacks();
        });
    });

    Router::build($route, '/galerie', ['controller' => 'gallery', 'action' => 'index']);
    Router::build($route, '/galeria/*', ['controller' => 'gallery', 'action' => 'view']);
    Router::build($route, '/gallery/delete/*', ['controller' => 'gallery', 'action' => 'delete']);

//    $routes->get(
//        '/cooks/:id',
//        ['controller' => 'Users', 'action' => 'view'],
//        'users:view'
//    );
});
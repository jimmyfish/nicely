<?php

$router->group([
    'prefix' => 'api/v1'
], function ($router) {
    $router->post('register', 'Auth\RegisterController');
    $router->post('login', 'Auth\LoginController');

    $router->group([
        'middleware' => [
            'auth'
        ]
    ], function ($router) {
        $router->group([
            'middleware' => [
                'has_role:admin'
            ],
            'prefix'     => 'admin',
            'namespace'  => 'Admin'
        ], function ($router) {
            $router->group([
                'prefix'    => 'user',
                'namespace' => 'User'
            ], function ($router) {
                $router->get('/', 'GetController');
                $router->get('{id}', 'GetOneController');
                $router->post('/', 'CreateController');
                $router->put('{id}', 'UpdateController');
                $router->delete('{id}', 'DeleteController');
                $router->post('privilege/{id}', 'SetPrivilegeController');
            });
        });

        $router->group([
            'middleware' => [
                'has_role:article'
            ],
            'prefix'     => 'article',
            'namespace'  => 'Article'
        ], function ($router) {
            $router->get('/', 'GetArticleController');
        });

        $router->group([
            'middleware' => [
                'has_role:finance'
            ],
            'prefix'     => 'finance',
            'namespace'  => 'Finance'
        ], function ($router) {
            $router->get('/', 'GetFinanceController');
        });

        $router->group([
            'middleware' => [
                'has_role:building'
            ],
            'prefix'     => 'building',
            'namespace'  => 'Building'
        ], function ($router) {
            $router->get('/', 'GetBuildingController');
        });
    });

});

<?php

$router->get('/', ['as' => 'get.users', 'uses' => 'Users\Http\Controllers\UserController@getUsers']);


$router->group(['prefix' => 'api/v1'], function($router){
    $router->post('/auth/login', ['uses' => 'Users\Http\Controllers\AuthController@postLogin']);
    $router->post('/auth/refresh', ['middleware' => 'jwt.refresh']);

    $router->group(['middleware' => ['before' => 'jwt.auth']], function($router){
        $router->get('/users', ['as' => 'get.users', 'uses' => 'Users\Http\Controllers\UserController@getUsers']);
        $router->get('/users/{slug}', ['uses' => 'Users\Http\Controllers\UserController@getUser']);
    });
});
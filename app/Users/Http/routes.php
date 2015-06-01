<?php

$router->group(['prefix' => 'api/v1'], function($router){
    $router->post('/auth/login', ['uses' => 'Users\Http\Controllers\AuthController@postLogin']);
    $router->get('/users', ['uses' => 'Users\Http\Controllers\UserController@getUsers']);
    $router->get('/user/{slug}', ['uses' => 'Users\Http\Controllers\UserController@getUser']);
});
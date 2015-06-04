<?php

$router->group(['prefix' => 'api/v1', 'middleware' => ['before' => 'jwt.auth']], function($router){
    $router->get('/carts', ['uses' => 'Cart\Http\Controllers\CartController@getUserCart']);
    $router->post('/carts', ['uses' => 'Cart\Http\Controllers\CartController@postAddToCart']);
});
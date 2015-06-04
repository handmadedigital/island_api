<?php

$router->group(['prefix' => 'api/v1', 'middleware' => ['before' => 'jwt.auth']], function($router){
   $router->post('/orders', ['uses' => 'Orders\Http\Controllers\OrderController@postAddOrder']);
   $router->get('/orders', ['uses' => 'Orders\Http\Controllers\OrderController@getUserOrders']);
   $router->get('/orders/{order_number}', ['uses' => 'Orders\Http\Controllers\OrderController@getOrder']);
});
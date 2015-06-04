<?php

$router->group(['prefix' => 'api/v1', 'middleware' => ['before' => 'jwt.auth']], function($router){
    $router->get('/shippingContainers', ['uses' => 'Shipping\Http\Controllers\ShippingController@getShippingContainer']);
});
<?php

$router->group(['prefix' => 'api/v1'], function($router){
   $router->get('/products', ['uses' => 'Products\Http\Controllers\ProductController@getProducts']);
   $router->get('/products/{product_slug}', ['uses' => 'Products\Http\Controllers\ProductController@getProduct']);
});
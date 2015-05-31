<?php

$router->group(['prefix' => 'api/v1'], function($router){
   $router->get('/products', ['uses' => 'Products\Http\Controllers\ProductController@getProducts']);
});
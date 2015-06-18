<?php

$router->group(['prefix' => 'api/v1'], function($router){
   $router->get('/products', ['uses' => 'Products\Http\Controllers\ProductController@getProducts']);
   $router->get('/products/images', ['uses' => 'Products\Http\Controllers\ProductController@getProductImages']);
   $router->post('/products', ['uses' => 'Products\Http\Controllers\ProductController@postAddProduct']);
   $router->get('/products/{product_slug}', ['uses' => 'Products\Http\Controllers\ProductController@getProduct']);
   $router->get('/variants', ['uses' => 'Products\Http\Controllers\VariantController@getVariants']);
   $router->get('/variants/{variant_id}', ['uses' => 'Products\Http\Controllers\VariantController@getVariant']);

});
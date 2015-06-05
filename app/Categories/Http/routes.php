<?php

$router->group(['prefix' => 'api/v1', 'middleware' => 'jwt.auth'], function($router)
{
    $router->get('/categories', ['uses' => 'Categories\Http\Controllers\CategoryController@getCategories']);
    $router->get('/{category_slug}/products', ['uses' => 'Categories\Http\Controllers\CategoryController@getCategory']);
});

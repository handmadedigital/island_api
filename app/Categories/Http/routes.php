<?php

$router->group(['prefix' => 'api/v1'], function($router)
{
    $router->get('/categories', ['uses' => 'Categories\Http\Controllers\CategoryController@getCategories']);
});

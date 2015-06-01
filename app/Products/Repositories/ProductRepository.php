<?php namespace ThreeAccents\Products\Repositories;

use ThreeAccents\Products\Entities\Product;

class ProductRepository
{
    protected $model;

    function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getPaginated($limit)
    {
        return $this->model->with('categories', 'options', 'options.values', 'images')->latest()->paginate($limit);
    }
}
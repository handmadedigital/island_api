<?php namespace ThreeAccents\Categories\Repositories;

use ThreeAccents\Categories\Entities\Category;

class CategoryRepository
{
    protected $model;

    function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
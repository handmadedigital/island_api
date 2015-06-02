<?php namespace ThreeAccents\Products\Repositories;

use ThreeAccents\Products\Entities\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @param Product $model
     */
    function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getPaginated($limit)
    {
        return $this->model->with('categories', 'options', 'options.values', 'images')->latest()->paginate($limit);
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getBySlug($slug)
    {
        return $this->model->with('categories', 'options', 'options.values', 'images')->where('slug', '=', $slug)->first();

    }
}
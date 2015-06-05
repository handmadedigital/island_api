<?php namespace ThreeAccents\Categories\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Categories\Entities\Category;
use ThreeAccents\Categories\Http\Transformers\CategoryTransformer;
use ThreeAccents\Categories\Services\CategoryService;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Products\Http\Transformers\ProductTransformer;

class CategoryController extends ApiController
{
    /**
     * @var CategoryService
     */
    protected $service;

    /**
     * @param CategoryService $service
     */
    function __construct(CategoryService $service, Manager $fractal)
    {
        $this->service = $service;
        $this->fractal = $fractal;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCategories()
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $categories = $this->service->getCategories();

        return  $this->respondWithCollection($categories, new CategoryTransformer, 'categories');
    }

    public function getCategory($category_slug)
    {
        $category = Category::where('slug', '=', $category_slug)->first();

        $products = $category->products;

        return $this->respondWithCollection($products, new ProductTransformer());
    }
}
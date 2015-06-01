<?php namespace ThreeAccents\Products\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Http\Transformers\ProductTransformer;
use ThreeAccents\Products\Services\ProductService;

class ProductController extends ApiController
{
    /**
     * @var ProductService
     */
    protected $service;

    /**
     * @param ProductService $service
     * @param Manager $fractal
     */
    function __construct(ProductService $service, Manager $fractal)
    {
        $this->service = $service;
        $this->fractal = $fractal;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getProducts()
    {
        $includes = Input::get('includes') ?: "";
        $limit = Input::get('limit') ?: 20;

        $this->fractal->parseIncludes($includes);

        $products = $this->service->getPaginated($limit);

        return  $this->respondWithCollection($products, new ProductTransformer, 'products');
    }
}
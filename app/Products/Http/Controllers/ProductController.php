<?php namespace ThreeAccents\Products\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Commands\AddProductCommand;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Exceptions\ProductNotFoundException;
use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Http\Requests\AddProductRequest;
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
     * get all of the products
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getProducts()
    {
        $includes = Input::get('includes') ?: "";

        $limit = Input::get('limit') ?: 20;

        $this->fractal->parseIncludes($includes);

        $products = $this->service->getProducts($limit);

        return  $this->respondWithCollection($products, new ProductTransformer);
    }

    /**
     * get an individual product
     *
     * @param $product_slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getProduct($product_slug)
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        try
        {
            $product = $this->service->getProduct($product_slug);
        }
        catch(ProductNotFoundException $e)
        {
            $this->setStatusCode(404);
            return $this->respondWithError($e->getMessage(), 420);
        }

        return  $this->respondWithItem($product, new ProductTransformer);
    }

    /**
     * Add a new product or variant
     *
     * @param AddProductRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAddProduct(AddProductRequest $request)
    {
        $this->dispatchFrom(AddProductCommand::class, $request);

        return $this->respondWithArray([
            'message'=>'Product was added!'
        ]);
    }
}
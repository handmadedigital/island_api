<?php namespace ThreeAccents\Products\Http\Controllers;

use Illuminate\Support\Facades\Input;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Http\Transformers\ProductTransformer;

class ProductController extends ApiController
{
    public function getProducts()
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $products = Product::latest()->paginate(8);

        return  $this->respondWithCollection($products, new ProductTransformer, 'products');
    }
}
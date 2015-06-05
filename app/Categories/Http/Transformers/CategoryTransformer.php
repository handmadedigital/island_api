<?php namespace ThreeAccents\Categories\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Categories\Entities\Category;
use ThreeAccents\Products\Http\Transformers\ProductTransformer;

class CategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'products'
    ];

    public function transform(Category $category)
    {
        return [
            'id' => (int) $category->id,
            'name' => $category->name,
            'image_src' => 'http://localhost:8000/static/img/'.$category->image,
        ];
    }

    public function includeProducts(Category $category)
    {
        $products = $category->products;

        return $this->collection($products, new ProductTransformer());
    }
}
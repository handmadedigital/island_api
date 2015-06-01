<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Categories\Http\Transformers\CategoryTransformer;
use ThreeAccents\Products\Entities\Product;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'categories'
    ];

    public function transform(Product $product)
    {
        return [
            'id' => (int) $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'image_src' => 'http://localhost:8000/media/product_images/'.$product->images[0]->src
        ];
    }

    public function includeCategories(Product $product)
    {
        $categories = $product->categories;

        return $this->collection($categories, new CategoryTransformer(), 'categories');
    }
}
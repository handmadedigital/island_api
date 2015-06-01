<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Products\Entities\Product;

class ProductTransformer extends TransformerAbstract
{
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
}
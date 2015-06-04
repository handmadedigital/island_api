<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Categories\Http\Transformers\CategoryTransformer;
use ThreeAccents\Products\Entities\Product;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'categories',
        'variants',
        'options'
    ];

    public function transform(Product $product)
    {
        return [
            'id' => (int) $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'image_src' => 'https://island-api.herokuapp.com/media/product_images/'.$product->images[0]->src
        ];
    }

    public function includeCategories(Product $product)
    {
        $categories = $product->categories;

        return $this->collection($categories, new CategoryTransformer());
    }


    public function includeVariants(Product $product)
    {
        $variants = $product->variants;

        return $this->collection($variants, new VariantTransformer());
    }

    public function includeOptions(Product $product)
    {
        $options = $product->options;

        return $this->collection($options, new ProductOptionTransformer());
    }

}
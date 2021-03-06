<?php

namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Products\Entities\ProductImage;

class ProductImageTransformer extends TransformerAbstract
{
    public function transform(ProductImage $image)
    {
        return [
            'id' => (int) $image->id,
            'image_src' => 'https://island-api.herokuapp.com/media/product_images/'.$image->src
        ];
    }
}
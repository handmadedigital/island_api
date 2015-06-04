<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Products\Entities\ProductOptionValue;

class ProductOptionValueTransformer extends TransformerAbstract
{
    public function transform(ProductOptionValue $productOptionValue)
    {
        return [
            'id' => (int) $productOptionValue->id,
            'name' => $productOptionValue->name
        ];
    }
}
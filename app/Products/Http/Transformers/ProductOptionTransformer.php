<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Products\Entities\ProductOption;

class ProductOptionTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'values'
    ];

    public function transform(ProductOption $productOption)
    {
        return [
            'id' => (int) $productOption->id,
            'name' => $productOption->name
        ];
    }

    public function includeValues(ProductOption $productOption)
    {
        $values = $productOption->values;

        return $this->collection($values, new ProductOptionValueTransformer);
    }
}
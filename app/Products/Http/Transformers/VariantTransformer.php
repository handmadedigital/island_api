<?php namespace ThreeAccents\Products\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Products\Entities\Variant;

class VariantTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'product'
    ];

    public function transform(Variant $variant)
    {
        $option_value = null;


        if( ! empty($variant->optionValues->toArray())) $option_value =  $variant->optionValues[0]->name;

        return [
            'id' => (int) $variant->id,
            'price' => $variant->price,
            'weight' => $variant->weight,
            'quantity' => (int)$variant->quantity,
            'cubic_feet' => $variant->cubic_feet,
            'option_value' => $option_value
        ];
    }

    public function includeProduct(Variant $variant)
    {
        $product = $variant->product;

        return $this->item($product, new ProductTransformer());
    }
}
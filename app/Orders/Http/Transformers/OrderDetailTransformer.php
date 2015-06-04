<?php namespace ThreeAccents\Orders\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Orders\Entities\OrderDetail;

class OrderDetailTransformer extends TransformerAbstract
{
    public function transform(OrderDetail $detail)
    {
        $option_value = null;

        if( ! empty($detail->variant->optionValues->toArray())) $option_value =  $detail->variant->optionValues[0]->name;

        return [
            'id' => (int) $detail->id,
            'product_name' => $detail->variant->product->name,
            'option' => $option_value,
            'weight' => $detail->variant->weight,
            'cubic_feet' => $detail->variant->cubic_feet,
            'quantity' => $detail->variant->quantity,
            'price' => $detail->variant->price,
        ];
    }
}
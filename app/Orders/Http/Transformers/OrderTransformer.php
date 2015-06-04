<?php namespace ThreeAccents\Orders\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Orders\Entities\Order;

class OrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'order_details'
    ];

    public function transform(Order $order)
    {
        return [
            'id' => (int) $order->id,
            'order_number' => (int) $order->order_number,
            'total_price' => $order->total_price,
            'cubic_feet' => $order->cubic_feet,
            'weight' => $order->weight
        ];
    }

    public function includeOrderDetails(Order $order)
    {
        $details = $order->details;

        return $this->collection($details, new OrderDetailTransformer);
    }
}
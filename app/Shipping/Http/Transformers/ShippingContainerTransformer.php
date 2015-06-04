<?php namespace ThreeAccents\Shipping\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Shipping\Entities\ShippingContainer;

class ShippingContainerTransformer extends TransformerAbstract
{
    public function transform(ShippingContainer $container)
    {
        return [
            'id' => (int) $container->id,
            'name' => $container->name,
            'capacity' => $container->capacity,
            'image_src' => 'https://island-api.herokuapp.com/static/img/'.$container->image
        ];
    }
}
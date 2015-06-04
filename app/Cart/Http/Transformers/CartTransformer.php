<?php namespace ThreeAccents\Cart\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Cart\Entities\Cart;
use ThreeAccents\Products\Http\Transformers\VariantTransformer;

class CartTransformer extends TransformerAbstract
{
    public function transform(Cart $cart)
    {

        return [
            'id' => (int) $cart->id,
            'variant_id' => (int) $cart->variants->id,
            'weight' => $cart->variants->weight,
            'cubic_feet' => $cart->variants->cubic_feet * $cart->quantity,
            'product_name' => $cart->variants->product->name,
            'product_image' => 'https://island-api.herokuapp.com/media/product_images/'.$cart->variants->product->images[0]->src,
            'quantity' => (int) $cart->quantity,
            'price' => $cart->variants->price,
            'total_price' => $cart->variants->price * $cart->quantity,
        ];
    }
}

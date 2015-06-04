<?php namespace ThreeAccents\Cart\Repositories;

use ThreeAccents\Cart\Entities\Cart;

class CartRepository
{
    protected $model;

    function __construct(Cart $model)
    {
        $this->model = $model;
    }

    public function add($cart)
    {
        $this->model->variant_id = $cart->variant_id;
        $this->model->user_id = $cart->user_id;
        $this->model->quantity = $cart->quantity;

        $this->model->save();
    }
}
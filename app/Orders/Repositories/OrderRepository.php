<?php namespace ThreeAccents\Orders\Repositories;

use ThreeAccents\Exceptions\OrderNotFoundException;
use ThreeAccents\Orders\Entities\Order;

class OrderRepository
{
    protected $model;

    function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getByUserId($user_id)
    {
        return $this->model->where('user_id', '=', $user_id)->get();
    }

    public function getOrderByOrderNumber($order_number)
    {
        $order = $this->model->where('order_number', '=', $order_number)->first();

        if( ! $order) throw new OrderNotFoundException('Order '.$order_number.' not found');

        return $order;
    }

    public function add($order)
    {
        $this->model->user_id = $order->user_id;
        $this->model->order_number = rand(10000,99999);
        $this->model->cubic_feet = $order->cubic_feet;
        $this->model->weight = $order->weight;
        $this->model->total_price = $order->total_price;

        $this->model->save();

        return $this->model;
    }
}
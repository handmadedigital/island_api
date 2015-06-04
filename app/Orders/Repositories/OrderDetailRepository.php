<?php namespace ThreeAccents\Orders\Repositories;

use ThreeAccents\Orders\Entities\OrderDetail;

class OrderDetailRepository
{
    protected $model;

    function __construct(OrderDetail $model)
    {
        $this->model = $model;
    }

    public function add($orderDetail)
    {
        $count = count($orderDetail->variant_id);

        for($i = 0; $i < $count; $i++)
        {
            $model = new OrderDetail();

            $model->order_id = $orderDetail->order_id;
            $model->variant_id = $orderDetail->variant_id[$i];
            $model->quantity = $orderDetail->quantity[$i];

            $model->save();
        }
    }
}
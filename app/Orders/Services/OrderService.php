<?php namespace ThreeAccents\Orders\Services;

use ThreeAccents\Orders\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepo;

    function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getUserOrders($user_id)
    {
        return $this->orderRepo->getByUserId($user_id);
    }

    public function getOrder($order_number)
    {
        return $this->orderRepo->getOrderByOrderNumber($order_number);
    }
}
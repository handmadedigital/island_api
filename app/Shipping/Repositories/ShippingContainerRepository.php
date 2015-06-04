<?php namespace ThreeAccents\Shipping\Repositories;

use ThreeAccents\Shipping\Entities\ShippingContainer;

class ShippingContainerRepository
{
    protected $model;

    function __construct(ShippingContainer $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->get();
    }
}
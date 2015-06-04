<?php namespace ThreeAccents\Shipping\Services;

use ThreeAccents\Shipping\Repositories\ShippingContainerRepository;

class ShippingService
{
    /**
     * @var ShippingContainerRepository
     */
    protected $shippingRepo;

    function __construct(ShippingContainerRepository $shippingRepo)
    {
        $this->shippingRepo = $shippingRepo;
    }

    public function getShippingContainers()
    {
        return $this->shippingRepo->getAll();
    }
}
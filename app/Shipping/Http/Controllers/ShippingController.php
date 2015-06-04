<?php namespace ThreeAccents\Shipping\Http\Controllers;

use League\Fractal\Manager;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Shipping\Services\ShippingService;
use ThreeAccents\Shipping\Transformers\ShippingContainerTransformer;

class ShippingController extends ApiController
{
    /**
     * @var ShippingService
     */
    protected $service;

    function __construct(ShippingService $service, Manager $fractal)
    {
        $this->service = $service;
        $this->fractal = $fractal;
    }

    public function getShippingContainer()
    {
        $containers = $this->service->getShippingContainers();

        $this->respondWithCollection($containers, new ShippingContainerTransformer);
    }
}
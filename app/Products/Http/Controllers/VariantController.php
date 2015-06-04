<?php namespace ThreeAccents\Products\Http\Controllers;

use League\Fractal\Manager;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Exceptions\VariantNotFoundException;
use ThreeAccents\Products\Http\Transformers\VariantTransformer;
use ThreeAccents\Products\Services\VariantService;

class VariantController extends ApiController
{
    /**
     * @var VariantService
     */
    protected $service;

    function __construct(VariantService $service, Manager $fractal)
    {
        $this->service = $service;
        $this->fractal = $fractal;
    }

    public function getVariant($variant_id)
    {
        try
        {
            $variant = $this->service->getVariant($variant_id);
        }
        catch(VariantNotFoundException $e)
        {
            $this->setStatusCode(404);
            return $this->respondWithError($e->getMessage(), 420);
        }

        return  $this->respondWithItem($variant, new VariantTransformer);
    }
}
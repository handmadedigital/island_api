<?php namespace ThreeAccents\Products\Services;

use ThreeAccents\Products\Repositories\VariantRepository;

class VariantService
{
    /**
     * @var VariantRepository
     */
    protected $variantRepo;

    function __construct(VariantRepository $variantRepo)
    {
        $this->variantRepo = $variantRepo;
    }

    public function getVariant($variant_id)
    {
        return $this->variantRepo->getById($variant_id);
    }
}
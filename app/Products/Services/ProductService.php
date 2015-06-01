<?php namespace ThreeAccents\Products\Services;


use ThreeAccents\Products\Repositories\ProductRepository;

class ProductService
{
    /**
     * @var ProductRepository
     */
    protected $productRepo;

    /**
     * @param ProductRepository $productRepo
     */
    function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * @return mixed
     */
    public function getPaginated($limit)
    {
        return $this->productRepo->getPaginated($limit);
    }
}
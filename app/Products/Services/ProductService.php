<?php namespace ThreeAccents\Products\Services;


use ThreeAccents\Exceptions\ProductNotFoundException;
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
    public function getProducts($limit)
    {
        return $this->productRepo->getPaginated($limit);
    }

    public function getProduct($product_slug)
    {
        $product = $this->productRepo->getBySlug($product_slug);

        if( ! $product) throw new ProductNotFoundException("product ".$product_slug." was not found!");

        return $product;
    }
}
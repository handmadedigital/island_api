<?php namespace ThreeAccents\Categories\Services;

use ThreeAccents\Categories\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepo;

    /**
     * @param CategoryRepository $categoryRepo
     */
    function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categoryRepo->getAll();
    }
}
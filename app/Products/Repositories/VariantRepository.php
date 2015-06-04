<?php namespace ThreeAccents\Products\Repositories;

use ThreeAccents\Exceptions\VariantNotFoundException;
use ThreeAccents\Products\Entities\Variant;

class VariantRepository
{
    protected $model;

    function __construct(Variant $model)
    {
        $this->model = $model;
    }

    public function getById($id)
    {
        $variant =  $this->model->with('optionValues')->find($id);

        if( ! $variant) throw new VariantNotFoundException('variant with an id of '.$id.' was not found');

        return $variant;
    }
}
<?php namespace ThreeAccents\Users\Repositories;

use ThreeAccents\Users\Entities\User;

class UserRepository
{
    protected $model;

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->first();
    }
}
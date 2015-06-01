<?php namespace ThreeAccents\Users\Services;

use ThreeAccents\Users\Repositories\UserRepository;

class UserService
{
    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getUsers()
    {
        return $this->userRepo->getAll();
    }

    public function getUser($slug)
    {
        return $this->userRepo->findBySlug($slug);
    }
}
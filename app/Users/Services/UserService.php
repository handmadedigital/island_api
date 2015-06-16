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

    public function getUser($user_id)
    {
        return $this->userRepo->findById($user_id);
    }
}
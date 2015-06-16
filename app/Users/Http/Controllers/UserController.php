<?php namespace ThreeAccents\Users\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Users\Http\Transformers\UserTransformer;
use ThreeAccents\Users\Services\UserService;

class UserController extends ApiController
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @param UserService $service
     * @param Manager $fractal
     */
    function __construct(UserService $service, Manager $fractal)
    {
        $this->service = $service;
        $this->fractal = $fractal;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getUsers()
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $users = $this->service->getUsers();

        return  $this->respondWithCollection($users, new UserTransformer, 'users');
    }

    /**
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getUser($user_id)
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $user = $this->service->getUser($user_id);

        return  $this->respondWithItem($user, new UserTransformer, 'user');
    }
}
<?php namespace ThreeAccents\Users\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Users\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends ApiController
{
    /**
     * @var JWTAuth
     */
    protected $auth;

    function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Sign a user in and generate the jwt token
     *
     * @param LoginRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        try
        {
            if (! $token = $this->auth->attempt($credentials))
            {
                $this->setStatusCode(404);
                return $this->respondWithError('Invalid credentials', 510);
            }
        }
        catch (JWTException $e)
        {
            $this->setStatusCode(500);
            return $this->respondWithError('unable to create token', 555);
        }

        return $this->respondWithArray(compact('token'));
    }

    public function refreshToken()
    {
        $token =  $this->auth->parseToken()->refresh();

        return response()->json(compact('token'));
    }
}
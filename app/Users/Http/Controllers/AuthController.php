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

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        try
        {
            if (! $token = $this->auth->attempt($credentials))
            {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }
        catch (JWTException $e)
        {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }
}
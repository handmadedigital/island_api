<?php namespace ThreeAccents\Cart\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Cart\Http\Requests\AddToCartRequest;
use ThreeAccents\Cart\Http\Transformers\CartTransformer;
use ThreeAccents\Commands\AddToCartCommand;
use ThreeAccents\Core\Http\Controllers\ApiController;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;

class CartController extends ApiController
{
    protected $auth;

    function __construct(JWTAuth $auth, Manager $fractal)
    {
        $this->auth = $auth;
        $this->fractal = $fractal;
    }

    public function postAddToCart(AddToCartRequest $request)
    {
        if (! $user = $this->auth->parseToken()->authenticate())
        {
            $this->setStatusCode(404);
            $this->respondWithError('User not found', 420);
        }

        $this->dispatch(new AddToCartCommand($request->quantity, $request->variant_id, $user->id));

        return $this->respondWithArray([
            'message' => 'Product was added to cart'
        ]);
    }

    public function getUserCart()
    {
        if (! $user = $this->auth->parseToken()->authenticate())
        {
            $this->setStatusCode(404);
            $this->respondWithError('User not found', 420);
        }

        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $cart = $user->cart->latest();

        return $this->respondWithCollection($cart, new CartTransformer());
    }
}
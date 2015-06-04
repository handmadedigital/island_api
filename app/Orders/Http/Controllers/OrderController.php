<?php namespace ThreeAccents\Orders\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use ThreeAccents\Commands\AddOrderCommand;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Orders\Http\Requests\AddOrderRequest;
use ThreeAccents\Orders\Http\Transformers\OrderTransformer;
use ThreeAccents\Orders\Services\OrderService;
use Tymon\JWTAuth\JWTAuth;

class OrderController extends ApiController
{
    protected $service;

    /**
     * @var JWTAuth
     */
    protected $auth;

    function __construct(OrderService $service, JWTAuth $auth, Manager $fractal)
    {
        $this->service = $service;
        $this->auth = $auth;
        $this->fractal = $fractal;
    }

    public function postAddOrder(AddOrderRequest $request)
    {
        if (! $user = $this->auth->parseToken()->authenticate())
        {
            $this->setStatusCode(404);
            $this->respondWithError('User not found', 420);
        }

        $this->dispatch(new AddOrderCommand($user->id, $request->weight, $request->cubic_feet, $request->total_price));

        return $this->respondWithArray([
            'message' => 'Order was added!'
        ]);
    }

    public function getUserOrders()
    {
        if (! $user = $this->auth->parseToken()->authenticate())
        {
            $this->setStatusCode(404);
            $this->respondWithError('User not found', 420);
        }

        $orders = $this->service->getUserOrders($user->id);

        return $this->respondWithCollection($orders, new OrderTransformer());
    }

    public function getOrder($order_number)
    {
        $includes = Input::get('includes') ?: "";

        $this->fractal->parseIncludes($includes);

        $order = $this->service->getOrder($order_number);

        return $this->respondWithItem($order, New OrderTransformer);
    }
}

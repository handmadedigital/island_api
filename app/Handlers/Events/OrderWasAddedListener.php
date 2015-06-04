<?php namespace ThreeAccents\Handlers\Events;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use ThreeAccents\Cart\Entities\Cart;
use ThreeAccents\Commands\AddOrderDetailCommand;
use ThreeAccents\Events\OrderWasAdded;

class OrderWasAddedListener
{
    use DispatchesCommands;

    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function addOrderDetails(OrderWasAdded $event)
    {
        $this->dispatch(new AddOrderDetailCommand($event->order->id, $this->request->order['variant_ids'], $this->request->order['quantities']));
    }

    public function removeCartItems(OrderWasAdded $event)
    {
        Cart::where('user_id', '=', $event->order->user_id)->delete();
    }
}
<?php namespace ThreeAccents\Handlers\Events;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $this->dispatch(new AddOrderDetailCommand($event->order->id, $this->request->variant_ids, $this->request->quantities));
    }

    public function removeCartItems(OrderWasAdded $event)
    {
        Cart::where('user_id', '=', $event->order->user_id)->delete();
    }

    public function sendConfirmationEmail(OrderWasAdded $event)
    {
        $data = [
            'order_number' => $event->order->order_number,
            'cubic_feet' => $event->order->cubic_feet,
            'weight' => $event->order->weight,
            'price' => $event->order->total_price,
        ];

        Mail::send('emails.order-confirmation', $data, function ($message) {
            $message->from('rodrigo@threeaccents.com', 'Island Buyers Club');
            $message->to('rodrigo@handmade-digital.com');
        });
    }
}
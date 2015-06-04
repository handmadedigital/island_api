<?php namespace ThreeAccents\Events;

use ThreeAccents\Events\Event;

use Illuminate\Queue\SerializesModels;
use ThreeAccents\Orders\Entities\Order;

class OrderWasAdded extends Event {

	use SerializesModels;

	public  $order;

	function __construct(Order $order)
	{
		$this->order = $order;
	}

}

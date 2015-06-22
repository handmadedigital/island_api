<?php namespace ThreeAccents\Events;

use ThreeAccents\Events\Event;

use Illuminate\Queue\SerializesModels;

class ProductWasAdded extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}

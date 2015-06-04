<?php namespace ThreeAccents\Handlers\Commands;

use ThreeAccents\Commands\AddOrderCommand;

use Illuminate\Queue\InteractsWithQueue;
use ThreeAccents\Events\OrderWasAdded;
use ThreeAccents\Orders\Entities\Order;
use ThreeAccents\Orders\Repositories\OrderRepository;

class AddOrderCommandHandler
{

	protected $orderRepo;

	function __construct(OrderRepository $orderRepo)
	{
		$this->orderRepo = $orderRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  AddOrderCommand  $command
	 * @return void
	 */
	public function handle(AddOrderCommand $command)
	{
		$order = Order::add($command->getUserId(), $command->getCubicFeet(), $command->getWeight(), $command->getTotalPrice());

		$persisted_order = $this->orderRepo->add($order);

		event(new OrderWasAdded($persisted_order));
	}

}

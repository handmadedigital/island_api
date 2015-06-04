<?php namespace ThreeAccents\Handlers\Commands;

use ThreeAccents\Commands\AddOrderDetailCommand;

use Illuminate\Queue\InteractsWithQueue;
use ThreeAccents\Orders\Entities\OrderDetail;
use ThreeAccents\Orders\Repositories\OrderDetailRepository;

class AddOrderDetailCommandHandler
{
	protected $orderDetailRepo;

	function __construct(OrderDetailRepository $orderDetailRepo)
	{
		$this->orderDetailRepo = $orderDetailRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  AddOrderDetailCommand  $command
	 * @return void
	 */
	public function handle(AddOrderDetailCommand $command)
	{
		$order_detail = OrderDetail::add($command->getOrderId(), $command->getVariantIds(), $command->getQuantities());

		$this->orderDetailRepo->add($order_detail);
	}

}

<?php namespace ThreeAccents\Handlers\Commands;

use ThreeAccents\Cart\Entities\Cart;
use ThreeAccents\Cart\Repositories\CartRepository;
use ThreeAccents\Commands\AddToCartCommand;

use Illuminate\Queue\InteractsWithQueue;

class AddToCartCommandHandler
{

	protected $cartRepo;

	function __construct(CartRepository $cartRepo)
	{
		$this->cartRepo = $cartRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  AddToCartCommand  $command
	 * @return void
	 */
	public function handle(AddToCartCommand $command)
	{
		$cart = Cart::add($command->getVariantId(), $command->getQuantity(), $command->getUserId());

		$this->cartRepo->add($cart);
	}

}

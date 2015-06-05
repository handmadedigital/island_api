<?php namespace ThreeAccents\Handlers\Commands;

use ThreeAccents\Commands\AddProductCommand;

use Illuminate\Queue\InteractsWithQueue;
use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Repositories\ProductRepository;

class AddProductCommandHandler
{

	protected $productRepo;

	function __construct(ProductRepository $productRepo)
	{
		$this->productRepo = $productRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  AddProductCommand  $command
	 * @return void
	 */
	public function handle(AddProductCommand $command)
	{
		$product = Product::add($command->getName(), $command->getDescription(), $command->getLength(), $command->getWidth(), $command->getHeight(), $command->getCubicFeet(), $command->getWeight(), $command->getPrice(), $command->getOption(), $command->getOptionValue());

		$this->productRepo->add($product);
	}

}

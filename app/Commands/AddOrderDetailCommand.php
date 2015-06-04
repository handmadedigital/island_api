<?php namespace ThreeAccents\Commands;

use ThreeAccents\Commands\Command;

class AddOrderDetailCommand extends Command
{
	protected $order_id;
	protected $variant_ids;
	protected $quantities;

	function __construct($order_id, $variant_ids, $quantities)
	{
		$this->order_id = $order_id;
		$this->variant_ids = $variant_ids;
		$this->quantities = $quantities;
	}

	/**
	 * @return mixed
	 */
	public function getOrderId()
	{
		return $this->order_id;
	}

	/**
	 * @return mixed
	 */
	public function getVariantIds()
	{
		return $this->variant_ids;
	}

	/**
	 * @return mixed
	 */
	public function getQuantities()
	{
		return $this->quantities;
	}
}

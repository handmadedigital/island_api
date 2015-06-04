<?php namespace ThreeAccents\Commands;

class AddToCartCommand extends Command
{
	protected $quantity;
	protected $variant_id;
	protected $user_id;

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	function __construct($quantity, $variant_id, $user_id)
	{
		$this->quantity = $quantity;
		$this->variant_id = $variant_id;
		$this->user_id = $user_id;
	}

	/**
	 * @return mixed
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @return mixed
	 */
	public function getVariantId()
	{
		return $this->variant_id;
	}
}

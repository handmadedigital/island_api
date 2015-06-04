<?php namespace ThreeAccents\Commands;

use ThreeAccents\Commands\Command;

class AddOrderCommand extends Command
{
	protected $user_id;
	protected $weight;
	protected $cubic_feet;
	protected $total_price;

	function __construct($user_id, $weight, $cubic_feet, $total_price)
	{
		$this->user_id = $user_id;
		$this->weight = $weight;
		$this->cubic_feet = $cubic_feet;
		$this->total_price = $total_price;
	}

	/**
	 * @return mixed
	 */
	public function getTotalPrice()
	{
		return $this->total_price;
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * @return mixed
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * @return mixed
	 */
	public function getCubicFeet()
	{
		return $this->cubic_feet;
	}
}

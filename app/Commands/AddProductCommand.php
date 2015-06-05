<?php namespace ThreeAccents\Commands;

class AddProductCommand extends Command
{
	protected $name;
	protected $description;
	protected $length;
	protected $width;
	protected $height;
	protected $weight;
	protected $cubic_feet;
	protected $price;
	protected $option;
	protected $option_value;

	function __construct($name, $description, $length, $width, $height, $weight, $cubic_feet, $price, $option = null, $option_value = null)
	{
		$this->name = $name;
		$this->description = $description;
		$this->length = $length;
		$this->width = $width;
		$this->height = $height;
		$this->weight = $weight;
		$this->cubic_feet = $cubic_feet;
		$this->price = $price;
		$this->option = $option;
		$this->option_value = $option_value;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return mixed
	 */
	public function getLength()
	{
		return $this->length;
	}

	/**
	 * @return mixed
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * @return mixed
	 */
	public function getHeight()
	{
		return $this->height;
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

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @return mixed
	 */
	public function getOption()
	{
		return $this->option;
	}

	/**
	 * @return mixed
	 */
	public function getOptionValue()
	{
		return $this->option_value;
	}
}

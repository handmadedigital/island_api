<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'description', 'length', 'width', 'height', 'cubic_feet', 'weight', 'price', 'option', 'option_value', 'part_number'];

	/**************************/
	/*
	 * COMMANDS
	 */
	/**************************/

	public static function add($name, $description, $length, $width, $height, $cubic_feet, $weight, $price, $option, $option_value, $part_number)
	{
		return new static(compact('name', 'description', 'length', 'width', 'height', 'cubic_feet', 'weight', 'price', 'option', 'option_value', 'part_number'));
	}

	/**************************/
	/*
	 * RELATIONSHIPS
	 */
	/**************************/

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function variants()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\Variant');
	}

	/**
	 * @return mixed
     */
	public function masterVariant()
	{
		return $this->hasOne('ThreeAccents\Products\Entities\Variant')->where('is_master', '=', 1);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function options()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\ProductOption');
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function images()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\ProductImage');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function categories()
	{
		return  $this->belongsToMany('ThreeAccents\Categories\Entities\Category');
	}

}

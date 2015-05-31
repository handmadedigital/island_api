<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**************************/
	/*
	 * COMMANDS
	 */
	/**************************/

	/**************************/
	/*
	 * RELATIONSHIPS
	 */
	/**************************/

	public function variants()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\Variant');
	}

	public function masterVariant()
	{
		return $this->hasOne('ThreeAccents\Products\Entities\Variant')->where('is_master', '=', 1);
	}

	public function options()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\ProductOption');
	}


	public function images()
	{
		return $this->hasMany('ThreeAccents\Products\Entities\ProductImage');
	}

	public function categories()
	{
		return  $this->belongsToMany('ThreeAccents\Categories\Entities\Category');
	}

}

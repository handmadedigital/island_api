<?php namespace ThreeAccents\Cart\Entities;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'cart';

	protected $fillable = ['variant_id', 'quantity', 'user_id'];

	/****************************/
	/*
	 * COMMANDS
	 */
	/****************************/

	public static function add($variant_id, $quantity, $user_id)
	{
		return new static(compact('variant_id', 'quantity', 'user_id'));
	}

	/****************************/
	/*
	 * RELATIONSHIPS
	 */
	/****************************/

	public function variants()
	{
		return $this->belongsTo('ThreeAccents\Products\Entities\Variant', 'variant_id');
	}
}

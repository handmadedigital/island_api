<?php namespace ThreeAccents\Orders\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $fillable = ['order_id', 'variant_id', 'quantity'];

	/***************************/
	/*
	 * COMMANDS
	 */
	/***************************/

	public static function add($order_id, $variant_id, $quantity)
	{
		return new static(compact('order_id', 'variant_id', 'quantity'));
	}

	/***************************/
	/*
	 * RELATIONSHIPS
	 */
	/***************************/
	public function variant()
	{
		return $this->belongsTo('ThreeAccents\Products\Entities\Variant');
	}
}

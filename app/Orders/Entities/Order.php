<?php namespace ThreeAccents\Orders\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id', 'cubic_feet', 'weight', 'total_price'];

	/***************************/
	/*
	 * COMMANDS
	 */
	/***************************/

	public static function add($user_id, $cubic_feet, $weight, $total_price)
	{
		return new static(compact('user_id', 'cubic_feet', 'weight', 'total_price'));
	}

	/***************************/
	/*
	 * RELATIONSHIPS
	 */
	/***************************/

	public function details()
	{
		return $this->hasMany('ThreeAccents\Orders\Entities\OrderDetail');
	}

	public function user()
	{
		return $this->belongsTo('ThreeAccents\Users\Entities\User');
	}
}

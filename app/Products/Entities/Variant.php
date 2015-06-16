<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'is_master', 'width', 'weight', 'length', 'height', 'product_id'];

    /*******************************************/
    /*
     * Relationship Methods
     */
    /*******************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('ThreeAccents\Products\Entities\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function optionValues()
    {
        return $this->belongsToMany('ThreeAccents\Products\Entities\ProductOptionValue');
    }


}
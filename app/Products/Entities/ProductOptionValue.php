<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    protected $fillable = ['name'];

    /*******************************************/
    /*
     * Relationship Methods
     */
    /*******************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo('ThreeAccents\Products\Entities\ProductOption', 'product_option_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function variants()
    {
        return $this->belongsToMany('ThreeAccents\Products\Entities\Variant');
    }
}
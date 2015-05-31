<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = ['name'];

    /*******************************************/
    /*
     * Relationship Methods
     */
    /*******************************************/

    /**
     * a product_option belongs to a product
     * a product option is something like: color, size
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('ThreeAccents\Products\Entities\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany('ThreeAccents\Products\Entities\ProductOptionValue');
    }
}
<?php namespace ThreeAccents\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['src', 'product_id'];

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
}
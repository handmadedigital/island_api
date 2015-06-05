<?php namespace ThreeAccents\Categories\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return  $this->belongsToMany('ThreeAccents\Products\Entities\Product');
    }
}

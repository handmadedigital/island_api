<?php namespace ThreeAccents\Categories\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Categories\Entities\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' => (int) $category->id,
            'name' => $category->name,
            'image_src' => $category->image,
        ];
    }
}
<?php

use Illuminate\Support\Facades\DB;
use ThreeAccents\Categories\Entities\Category;

class CategoryTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        Category::unguard();

        Category::truncate();

        $categories = ['ladders', 'nails', 'building materials', 'roofing'];

        foreach($categories as $category)
        {
            Category::create([
                'name' => $category,
                'slug' => $this->sluggify($category),
                'image' => $this->sluggify($category).'-icon.png'
            ]);
        }
    }
}
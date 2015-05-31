<?php

class CategoriesControllerTest extends TestCase
{
    /** @test */
    public function it_returns_json_categories()
    {
        $this->get('/api/v1/categories')
            ->andSeeJson();
    }

    /** @test */
    public function it_returns_json_products()
    {
        $this->get('/api/v1/products')
            ->andSeeJson();
    }
}
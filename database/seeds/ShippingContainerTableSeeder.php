<?php

use Illuminate\Support\Facades\DB;
use ThreeAccents\Shipping\Entities\ShippingContainer;

class ShippingContainerTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        ShippingContainer::unguard();

        ShippingContainer::truncate();

        $names = ["20' container", "40' high cube container", "20' flat rack", "40' flat rack"];
        $capacities = [1070, 2480, 1140, 2370];
        $images = ['container-1-icon.png', 'container-2-icon.png', 'container-1-icon.png', 'container-2-icon.png'];

        for($i = 0; $i < count($names); $i++)
        {
            ShippingContainer::create([
                'name' => $names[$i],
                'capacity' => $capacities[$i],
                'image' => $images[$i]
            ]);
        }
    }
}
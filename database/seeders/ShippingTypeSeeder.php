<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ShippingType::create([
            'name' => 'In City',
            'slug' => 'in-city',
            'min_shipping_days' => 1,
            'max_shipping_days' => 1,
            'shipping_cost' => 200,
            'created_at' => now(),
        ]);
        \App\Models\ShippingType::create([
            'name' => 'In State',
            'slug' => 'in-state',
            'min_shipping_days' => 2,
            'max_shipping_days' => 3,
            'shipping_cost' => 300,
            'created_at' => now(),
        ]);
        \App\Models\ShippingType::create([
            'name' => 'In Country',
            'slug' => 'in-country',
            'min_shipping_days' => 5,
            'max_shipping_days' => 7,
            'shipping_cost' => 500,
            'created_at' => now(),
        ]);
    }
}

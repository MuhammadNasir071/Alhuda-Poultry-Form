<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'Fruits',
            'slug' => 'fruits',
            'image' => null,
            'parent_id' => null,
            'level' => 0,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Vegitables',
            'slug' => 'vegitables',
            'image' => null,
            'parent_id' => null,
            'level' => 0,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Pak Pink Salt',
            'slug' => 'pak-pink-salt',
            'image' => null,
            'parent_id' => null,
            'level' => 0,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Cereals',
            'slug' => 'cereals',
            'image' => null,
            'parent_id' => null,
            'level' => 0,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Spices',
            'slug' => 'spices',
            'image' => null,
            'parent_id' => null,
            'level' => 0,
            'created_at' => now(),
        ]);

        // Fruits sub-categories
        \App\Models\Category::create([
            'name' => 'Mangoes',
            'slug' => 'mangoes',
            'image' => null,
            'parent_id' => 1,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Citrus',
            'slug' => 'citrus',
            'image' => null,
            'parent_id' => 1,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Guava',
            'slug' => 'guava',
            'image' => null,
            'parent_id' => 1,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Apple',
            'slug' => 'apple',
            'image' => null,
            'parent_id' => 1,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Banana',
            'slug' => 'banana',
            'image' => null,
            'parent_id' => 1,
            'level' => 1,
            'created_at' => now(),
        ]);

        // Vagetabels sub-categories
        \App\Models\Category::create([
            'name' => 'Onion',
            'slug' => 'onion',
            'image' => null,
            'parent_id' => 2,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Potato',
            'slug' => 'potato',
            'image' => null,
            'parent_id' => 2,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Chillies',
            'slug' => 'chillies',
            'image' => null,
            'parent_id' => 2,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Tomato',
            'slug' => 'tomato',
            'image' => null,
            'parent_id' => 2,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Carrots',
            'slug' => 'carrots',
            'image' => null,
            'parent_id' => 2,
            'level' => 1,
            'created_at' => now(),
        ]);


        // Cereals sub-categories
        \App\Models\Category::create([
            'name' => 'Pulses',
            'slug' => 'pulses',
            'image' => null,
            'parent_id' => 4,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Rice',
            'slug' => 'rice',
            'image' => null,
            'parent_id' => 4,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Wheat',
            'slug' => 'wheat',
            'image' => null,
            'parent_id' => 4,
            'level' => 1,
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Maize',
            'slug' => 'maize',
            'image' => null,
            'parent_id' => 4,
            'level' => 1,
            'created_at' => now(),
        ]);
    }
}

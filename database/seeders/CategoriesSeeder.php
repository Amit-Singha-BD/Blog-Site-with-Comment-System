<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Categories::insert([
            [
                'categories_name' => 'Technology',
                'categories_slug' => 'tech',
                'categories_description' => 'All about technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categories_name' => 'Health',
                'categories_slug' => 'health',
                'categories_description' => 'Health tips and guides',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categories_name' => 'Travel',
                'categories_slug' => 'travel',
                'categories_description' => 'Explore travel destinations',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categories_name' => 'Education',
                'categories_slug' => 'education',
                'categories_description' => 'education',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categories_name' => 'Business',
                'categories_slug' => 'business',
                'categories_description' => 'busness',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

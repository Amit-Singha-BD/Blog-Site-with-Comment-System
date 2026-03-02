<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void {
        Post::insert([
            [
                'post_title'    => 'Laravel Seeder Tutorial',
                'category_id'   => 1,
                'slug'          => Str::slug('Laravel Seeder Tutorial') . '-' . uniqid(),
                'status'        => 'Published',
                'user_id'       => 1,
                'description'   => 'This post explains how to use Laravel seeders.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'post_title'    => 'PHP Basics',
                'category_id'   => 1,
                'slug'          => Str::slug('PHP Basics') . '-' . uniqid(),
                'status'        => 'Pending',
                'user_id'       => 1,
                'description'   => 'A beginner guide to PHP programming.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'post_title'    => 'Getting Started with Bootstrap',
                'category_id'   => 1,
                'slug'          => Str::slug('Getting Started with Bootstrap') . '-' . uniqid(),
                'status'        => 'Rejected',
                'user_id'       => 1,
                'description'   => 'This post helps you get started with Bootstrap framework.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'post_title'    => 'Started with Laravel',
                'category_id'   => 1,
                'slug'          => Str::slug('Started with Laravel') . '-' . uniqid(),
                'status'        => 'Draft',
                'user_id'       => 1,
                'description'   => 'This post helps you get started with Laravel framework.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);

        Post::factory()->count(100)->create();
    }
}

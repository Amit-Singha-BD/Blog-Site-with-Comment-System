<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array{
        $title = $this->faker->sentence(4);
        return [
            'post_title'    => $title,
            'category_id'   => $this->faker->numberBetween(1, 5),
            'slug'          => Str::slug($title) . '-' . uniqid(),
            'status'        => $this->faker->randomElement(['Published', 'Pending', 'Rejected', 'Draft']),
            'user_id'       => $this->faker->numberBetween(1, 4),
            'description'   => implode(' ', $this->faker->words(50)),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}

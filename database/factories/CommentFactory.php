<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 20),
            'title' => fake()->realText('40'),
            'comment' => fake()->realText('380'),
            'approved' => 1,
            'likes' => fake()->numberBetween(0,20),
            'dislikes' => fake()->numberBetween(0, 3),
            'commentable_id' => fake()->numberBetween(1, 24),
            'commentable_type' => 'App\Models\Product',
        ];
    }
}

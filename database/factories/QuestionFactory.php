<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->realText('110'),
            'user_id' => fake()->numberBetween(1, 20),
            'parent' => fake()->numberBetween(1,60),
            'product_id' => fake()->numberBetween(1, 24),
        ];
    }
}

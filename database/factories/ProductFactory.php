<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Faker\Generator;
use Faker\Provider\fa_IR\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->firstName,
            'price' => fake()->numberBetween(10000, 5000000),
            'discount' => fake()->numberBetween(0, 90),
            'brand_id' => Brand::all()->random()->id,
            'weight' => fake()->numberBetween(20, 10000),
            'introduction' => fake()->realText(2000),
            'image' => fake()->imageUrl(400, 400),
            'inventory' => fake()->numberBetween(1, 300),
            'sold' => fake()->numberBetween(0,100),
            'views' => fake()->numberBetween(0,1000),
            'user_id' => User::all()->random()->id,
        ];
    }
}

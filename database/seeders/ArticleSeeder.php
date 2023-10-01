<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ybazli\Faker\Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = new Faker();
        foreach (range(8,11) as $item) {
            DB::table('articles')->insert([
                'title' => $faker->sentence(),
                'slug' => $faker->word(),
                'article' => $faker->paragraph(),
                'reading_time' => fake()->numberBetween(1,20),
                'image' => '',
                'resize_image' => '',
                'is_news' => fake()->numberBetween(0,1),
                'is_video' => fake()->numberBetween(0,1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

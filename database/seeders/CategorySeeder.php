<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ybazli\Faker\Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = new Faker();
        foreach (range(3,8) as $item) {
            DB::table('categories')->insert([
                'title' => $faker->word(),
                'slug' => $faker->word(),
                'parent' => 172,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

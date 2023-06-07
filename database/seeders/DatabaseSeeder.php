<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Makes data consistent for each seeding
        Factory::create()->seed(1234);

        Category::factory(3)
        ->has(
            SubCategory::factory(4)
            ->has(Course::factory(5))
            )
        ->create();

        
    }
}

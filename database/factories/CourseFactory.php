<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = trim(fake()->sentence(), '.');
        return [
            'title' => ucfirst($title),
            'description' =>  fake()->text(),
            'price' => fake()->numberBetween(1000, 10000),
            'slug' => Str::slug($title, '-'),
            'rating' => fake()->randomFloat(1, 3, 4.9),

        ];
    }
}

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
        $date = fake()->dateTimeBetween('-52 weeks', '-1 week');
        return [
            'title' => ucfirst($title),
            'description' =>  fake()->paragraphs(8, true),
            'price' => fake()->numberBetween(1000, 10000),
            'slug' => Str::slug($title, '-'),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-52 weeks', '-1 week');
        return [
            'rating' => fake()->randomFloat(1, 3, 5),
            'review' => fake()->text(),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

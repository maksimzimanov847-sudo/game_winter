<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(rand(3, 6)),
            'comment' => $this->faker->paragraphs(rand(1, 3), true),
            'author' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }

    public function positive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(4, 5),
            ];
        });
    }

    public function negative(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(1, 2),
            ];
        });
    }

    public function neutral(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => 3,
            ];
        });
    }
}

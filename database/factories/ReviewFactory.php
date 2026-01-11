<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'comment' => $this->faker->paragraphs(3, true),
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

    public function highRated(): Factory
    {
        return $this->positive();
    }

    public function lowRated(): Factory
    {
        return $this->negative();
    }

    public function old(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => $this->faker->dateTimeBetween('-2 years', '-6 months'),
                'updated_at' => $this->faker->dateTimeBetween('-2 years', '-6 months'),
            ];
        });
    }

    public function recent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
                'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            ];
        });
    }

    public function withLongComment(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'comment' => $this->faker->paragraphs(10, true),
            ];
        });
    }

    public function withShortComment(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'comment' => $this->faker->sentence(),
            ];
        });
    }

    public function deleted(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            ];
        });
    }
}

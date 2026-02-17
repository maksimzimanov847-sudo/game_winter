<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Article;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'article_id' =>  Article::factory(),
            'rating'     => $this->faker->numberBetween(1, 5),
            'comment'    => $this->faker->paragraphs(3, true),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }

    /**
     * Привязать к существующему пользователю.
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }

    /**
     * Привязать к существующей статье.
     */
    public function forArticle(Article $article): static
    {
        return $this->state(fn (array $attributes) => [
            'article_id' => $article->id,
        ]);
    }

    /**
     * Положительный отзыв (4–5).
     */
    public function positive(): static
    {
        return $this->state(fn (array $attributes) => [
            'rating' => $this->faker->numberBetween(4, 5),
        ]);
    }

    /**
     * Отрицательный отзыв (1–2).
     */
    public function negative(): static
    {
        return $this->state(fn (array $attributes) => [
            'rating' => $this->faker->numberBetween(1, 2),
        ]);
    }

    /**
     * Нейтральный отзыв (3).
     */
    public function neutral(): static
    {
        return $this->state(fn (array $attributes) => [
            'rating' => 3,
        ]);
    }

    // Алиасы
    public function highRated(): static { return $this->positive(); }
    public function lowRated(): static  { return $this->negative(); }

    /**
     * Старый отзыв (более 6 месяцев назад).
     */
    public function old(): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => $this->faker->dateTimeBetween('-2 years', '-6 months'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', '-6 months'),
        ]);
    }

    /**
     * Недавний отзыв (менее месяца).
     */
    public function recent(): static
    {
        return $this->state(fn (array $attributes) => [
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
    }

    /**
     * Длинный комментарий.
     */
    public function withLongComment(): static
    {
        return $this->state(fn (array $attributes) => [
            'comment' => $this->faker->paragraphs(10, true),
        ]);
    }

    /**
     * Короткий комментарий.
     */
    public function withShortComment(): static
    {
        return $this->state(fn (array $attributes) => [
            'comment' => $this->faker->sentence(),
        ]);
    }

    /**
     * «Удалённый» отзыв (мягкое удаление).
     */
    public function deleted(): static
    {
        return $this->state(fn (array $attributes) => [
            'deleted_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ]);
    }
}

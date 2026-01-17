<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'title',
        'comment',
        'author',
        'rating',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'rating' => 5,
    ];

    public static function creationRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'comment' => 'required|string|min:10|max:1000',
            'author' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public static function updateRules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'comment' => 'sometimes|string|min:10|max:1000',
            'author' => 'sometimes|string|max:100',
            'rating' => 'sometimes|integer|min:1|max:5',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'title.required' => 'Заголовок отзыва обязателен для заполнения',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'comment.required' => 'Текст отзыва обязателен для заполнения',
            'comment.min' => 'Текст отзыва должен содержать минимум 10 символов',
            'comment.max' => 'Текст отзыва не должен превышать 1000 символов',
            'author.required' => 'Автор отзыва обязателен для указания',
            'author.max' => 'Имя автора не должно превышать 100 символов',
            'rating.required' => 'Рейтинг обязателен для указания',
            'rating.integer' => 'Рейтинг должен быть целым числом',
            'rating.min' => 'Рейтинг не может быть меньше 1',
            'rating.max' => 'Рейтинг не может быть больше 5',
        ];
    }

    public function scopeHighRated($query, int $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating);
    }

    public function scopeLowRated($query, int $maxRating = 2)
    {
        return $query->where('rating', '<=', $maxRating);
    }

    public function scopeByAuthor($query, string $authorName)
    {
        return $query->where('author', 'like', "%{$authorName}%");
    }

    public function scopeSearch($query, string $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%")
                ->orWhere('comment', 'like', "%{$searchTerm}%")
                ->orWhere('author', 'like', "%{$searchTerm}%");
        });
    }

    public function scopeOrder($query, string $orderBy = 'created_at', string $direction = 'desc')
    {
        $allowedColumns = ['id', 'title', 'author', 'rating', 'created_at', 'updated_at'];
        $allowedDirections = ['asc', 'desc'];

        $orderBy = in_array($orderBy, $allowedColumns) ? $orderBy : 'created_at';
        $direction = in_array($direction, $allowedDirections) ? $direction : 'desc';

        return $query->orderBy($orderBy, $direction);
    }

    public function getExcerpt(int $length = 150): string
    {
        if (strlen($this->comment) <= $length) {
            return $this->comment;
        }

        return substr($this->comment, 0, $length) . '...';
    }

    public function getStarRating(): string
    {
        $stars = '';
        $fullStars = $this->rating;
        $emptyStars = 5 - $fullStars;

        for ($i = 0; $i < $fullStars; $i++) {
            $stars .= '<span class="text-yellow-400">★</span>';
        }

        for ($i = 0; $i < $emptyStars; $i++) {
            $stars .= '<span class="text-gray-300">★</span>';
        }

        return $stars;
    }

    public function isPositive(): bool
    {
        return $this->rating >= 4;
    }

    public function isNegative(): bool
    {
        return $this->rating <= 2;
    }

    public function isNeutral(): bool
    {
        return $this->rating == 3;
    }

    public function getRatingColor(): string
    {
        return match($this->rating) {
            5, 4 => 'green',
            3 => 'yellow',
            1, 2 => 'red',
            default => 'gray',
        };
    }

    public function getRatingIcon(): string
    {
        return match($this->rating) {
            5 => '😍',
            4 => '😊',
            3 => '😐',
            2 => '😕',
            1 => '😠',
            default => '😶',
        };
    }

    public function incrementRating(int $increment = 1): bool
    {
        $this->rating = min(5, $this->rating + $increment);
        return $this->save();
    }

    public function decrementRating(int $decrement = 1): bool
    {
        $this->rating = max(1, $this->rating - $decrement);
        return $this->save();
    }

    public function isNew(): bool
    {
        return $this->created_at->gt(now()->subDays(7));
    }

    public function getTimeAgo(): string
    {
        return $this->created_at->diffForHumans();
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'comment' => $this->comment,
            'excerpt' => $this->getExcerpt(),
            'author' => $this->author,
            'rating' => $this->rating,
            'star_rating' => $this->getStarRating(),
            'is_positive' => $this->isPositive(),
            'is_new' => $this->isNew(),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'time_ago' => $this->getTimeAgo(),
            'rating_color' => $this->getRatingColor(),
            'rating_icon' => $this->getRatingIcon(),
        ];
    }

public function article(): HasMany
{
    return $this->hasMany(Article::class);
}
}

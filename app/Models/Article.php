<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'description',
        'author',
        'rating',
    ];

    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $attributes = [
        'rating' => 0,
    ];

    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:15000',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'rating' => 'required|integer|min:0|max:10',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'title.required' => 'Название статьи обязательно для заполнения',
            'title.max' => 'Название статьи не должно превышать 15000 символов',
            'description.required' => 'Описание статьи обязательно для заполнения',
            'author.required' => 'Автор статьи обязателен для указания',
            'rating.required' => 'Рейтинг статьи обязателен для указания',
            'rating.integer' => 'Рейтинг должен быть целым числом',
            'rating.min' => 'Рейтинг не может быть меньше 0',
            'rating.max' => 'Рейтинг не может быть больше 10',
        ];
    }

    public function scopeWithMinRating($query, $minRating = 0)
    {
        return $query->where('rating', '>=', $minRating);
    }

    public function scopeByAuthor($query, $authorName)
    {
        return $query->where('author', 'like', "%{$authorName}%");
    }

    public function scopeSearchByTitle($query, $searchTerm)
    {
        return $query->where('title', 'like', "%{$searchTerm}%");
    }

    public function getExcerpt($length = 100): string
    {
        if (strlen($this->description) <= $length) {
            return $this->description;
        }

        return substr($this->description, 0, $length) . '...';
    }

    public function getFormattedAuthor(): string
    {
        $parts = explode(' ', $this->author);

        if (count($parts) >= 2) {
            $lastName = $parts[0];
            $firstName = mb_substr($parts[1], 0, 1) . '.';
            $middleName = isset($parts[2]) ? mb_substr($parts[2], 0, 1) . '.' : '';

            return $lastName . ' ' . $firstName . $middleName;
        }

        return $this->author;
    }

    public function isPopular(): bool
    {
        return $this->rating > 7;
    }

    public function getQualityLevel(): string
    {
        if ($this->rating >= 9) {
            return 'Отличная';
        } elseif ($this->rating >= 7) {
            return 'Хорошая';
        } elseif ($this->rating >= 5) {
            return 'Средняя';
        } else {
            return 'Низкая';
        }
    }

    public function incrementRating(int $increment = 1): bool
    {
        $this->rating += $increment;
        return $this->save();
    }

    public function decrementRating(int $decrement = 1): bool
    {
        $this->rating = max(0, $this->rating - $decrement);
        return $this->save();
    }

public function reviews(): HasMany
{
    return $this->hasMany(Review::class);
}
}

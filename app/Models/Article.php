<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'author',
        'rating',
    ];

    /**
     * Атрибуты, которые должны быть скрыты при сериализации.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // при необходимости можно скрыть некоторые поля
    ];

    /**
     * Преобразование типов атрибутов.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Значения по умолчанию для атрибутов.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'rating' => 0,
    ];

    /**
     * Правила валидации для модели.
     *
     * @return array<string, string>
     */
    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'rating' => 'required|integer|min:0|max:10',
        ];
    }

    /**
     .
     *
     * @return array<string, string>
     */
    public static function validationMessages(): array
    {
        return [
            'title.required' => 'Название статьи обязательно для заполнения',
            'title.max' => 'Название статьи не должно превышать 150 символов',
            'description.required' => 'Описание статьи обязательно для заполнения',
            'author.required' => 'Автор статьи обязателен для указания',
            'rating.required' => 'Рейтинг статьи обязателен для указания',
            'rating.integer' => 'Рейтинг должен быть целым числом',
            'rating.min' => 'Рейтинг не может быть меньше 0',
            'rating.max' => 'Рейтинг не может быть больше 10',
        ];
    }

    /**

     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $minRating
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithMinRating($query, $minRating = 0)
    {
        return $query->where('rating', '>=', $minRating);
    }

    /**

     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $authorName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByAuthor($query, $authorName)
    {
        return $query->where('author', 'like', "%{$authorName}%");
    }

    /**
     * Область запроса для поиска по названию.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchTerm
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByTitle($query, $searchTerm)
    {
        return $query->where('title', 'like', "%{$searchTerm}%");
    }

    /**

     *
     * @param int $length
     * @return string
     */
    public function getExcerpt($length = 100): string
    {
        if (strlen($this->description) <= $length) {
            return $this->description;
        }

        return substr($this->description, 0, $length) . '...';
    }

    /**

     *
     * @return string
     */
    public function getFormattedAuthor(): string
    {
        // Предполагаем, что автор может быть в формате "Иванов Иван Иванович"
        $parts = explode(' ', $this->author);

        if (count($parts) >= 2) {
            $lastName = $parts[0];
            $firstName = mb_substr($parts[1], 0, 1) . '.';
            $middleName = isset($parts[2]) ? mb_substr($parts[2], 0, 1) . '.' : '';

            return $lastName . ' ' . $firstName . $middleName;
        }

        return $this->author;
    }

    /**
     * Проверить, является ли статья популярной (рейтинг > 7).
     *
     * @return bool
     */
    public function isPopular(): bool
    {
        return $this->rating > 7;
    }

    /**
     * Получить уровень качества статьи на основе рейтинга.
     *
     * @return string
     */
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

    /**
     * Увеличить рейтинг статьи.
     *
     * @param int $increment
     * @return bool
     */
    public function incrementRating(int $increment = 1): bool
    {
        $this->rating += $increment;
        return $this->save();
    }

    /**
     * Уменьшить рейтинг статьи.
     *
     * @param int $decrement
     * @return bool
     */
    public function decrementRating(int $decrement = 1): bool
    {
        $this->rating = max(0, $this->rating - $decrement);
        return $this->save();
    }
}

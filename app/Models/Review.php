<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'article_id',
        'rating',
        'comment',
    ];

    protected $casts = [
        'rating'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'rating' => 5,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }



    public static function creationRules(): array
    {
        return [
            'article_id' => 'required|exists:articles,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|min:10|max:1000',
        ];
    }

    public static function updateRules(): array
    {
        return [
            'article_id' => 'sometimes|exists:articles,id',
            'rating'     => 'sometimes|integer|min:1|max:5',
            'comment'    => 'sometimes|nullable|string|min:10|max:1000',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'article_id.required' => 'Не указана статья.',
            'article_id.exists'   => 'Выбранная статья не существует.',
            'rating.required'     => 'Рейтинг обязателен.',
            'rating.integer'      => 'Рейтинг должен быть целым числом.',
            'rating.min'          => 'Рейтинг не может быть меньше 1.',
            'rating.max'          => 'Рейтинг не может быть больше 5.',
            'comment.min'         => 'Комментарий должен содержать минимум 10 символов.',
            'comment.max'         => 'Комментарий не должен превышать 1000 символов.',
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

    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeByArticle($query, int $articleId)
    {
        return $query->where('article_id', $articleId);
    }

    public function scopeSearch($query, string $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('comment', 'like', "%{$searchTerm}%")
                ->orWhereHas('user', fn ($u) => $u->where('name', 'like', "%{$searchTerm}%"));
        });
    }

    public function getExcerpt(int $length = 150): string
    {
        if (empty($this->comment)) {
            return '';
        }
        return strlen($this->comment) <= $length
            ? $this->comment
            : substr($this->comment, 0, $length) . '…';
    }

    public function getStarRating(): string
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= $i <= $this->rating
                ? '<span class="text-yellow-400">★</span>'
                : '<span class="text-gray-300">★</span>';
        }
        return $stars;
    }

    public function isPositive(): bool { return $this->rating >= 4; }
    public function isNegative(): bool { return $this->rating <= 2; }
    public function isNeutral(): bool  { return $this->rating == 3; }

    public function getRatingColor(): string
    {
        return match (true) {
            $this->rating >= 4 => 'green',
            $this->rating == 3 => 'yellow',
            default            => 'red',
        };
    }

    public function getRatingIcon(): string
    {
        return match ($this->rating) {
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
            'id'           => $this->id,
            'user'         => [
                'id'   => $this->user?->id,
                'name' => $this->user?->name,
            ],
            'article'      => [
                'id'    => $this->article?->id,
                'title' => $this->article?->title,
            ],
            'comment'      => $this->comment,
            'excerpt'      => $this->getExcerpt(),
            'rating'       => $this->rating,
            'star_rating'  => $this->getStarRating(),
            'is_positive'  => $this->isPositive(),
            'is_new'       => $this->isNew(),
            'created_at'   => $this->created_at->format('Y-m-d H:i:s'),
            'time_ago'     => $this->getTimeAgo(),
            'rating_color' => $this->getRatingColor(),
            'rating_icon'  => $this->getRatingIcon(),
        ];
    }
}

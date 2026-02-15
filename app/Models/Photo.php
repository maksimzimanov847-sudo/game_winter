<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = [
        'photoable_id',
        'photoable_type',
        'original_path',
        'thumbnail_path',
        'detail_path',
        'original_name',
        'size',
        'mime_type',
        'order',
    ];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getOriginalUrlAttribute(): string
    {
        return Storage::url($this->original_path);
    }

    public function getThumbnailUrlAttribute(): string
    {
        return Storage::url($this->thumbnail_path);
    }

    public function getDetailUrlAttribute(): string
    {
        return Storage::url($this->detail_path);
    }

    protected static function booted(): void
    {
        static::deleting(function (Photo $photo) {
            Storage::delete((string)[
                $photo->original_path,
                $photo->thumbnail_path,
                $photo->detail_path,
            ]);
        });
    }
}

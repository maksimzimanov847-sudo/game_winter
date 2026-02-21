<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPhotos;

class VideoGuide extends Model
{
    use HasPhotos;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'duration',
        'author',
    ];

    // Если нужно переопределить имя таблицы
    protected $table = 'video_guides';
}

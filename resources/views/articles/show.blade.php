@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="article-container">
        <div class="article-header">
            <a href="{{ route('articles.index') }}" class="btn-back">
                <span class="btn-back-icon">←</span>
                Назад к списку статей
            </a>
            <div class="article-title-section">
                <h1>{{ $article->title }}</h1>
                <div class="article-meta">
                    <span class="article-author">Автор: {{ $article->getFormattedAuthor() }}</span>
                    <span class="article-date">Создано: {{ $article->created_at->format('d.m.Y H:i') }}</span>
                    <span class="article-date">Обновлено: {{ $article->updated_at->format('d.m.Y H:i') }}</span>
                </div>
            </div>
        </div>

        <div class="article-content">
            <div class="article-rating-section">
                <div class="rating-info">
                    <span class="rating-label">Рейтинг:</span>
                    <span class="rating-value">{{ $article->rating }}</span>
                    <span class="quality-badge {{ $article->isPopular() ? 'popular' : '' }}">
                    {{ $article->getQualityLevel() }}
                </span>
                </div>
                <div class="rating-controls">
                    <form action="{{ route('articles.incrementRating', $article) }}"
                          method="POST" class="rating-form">
                        @csrf
                        <button type="submit" class="btn-rating btn-rating-plus">+</button>
                    </form>
                    <form action="{{ route('articles.decrementRating', $article) }}"
                          method="POST" class="rating-form">
                        @csrf
                        <button type="submit" class="btn-rating btn-rating-minus">-</button>
                    </form>
                </div>
            </div>

            <div class="article-description">
                <h3>Описание:</h3>
                <p>{{ $article->description }}</p>
            </div>

            <div class="article-actions">
                <a href="{{ route('articles.edit', $article) }}" class="btn-action btn-edit">
                    <span class="btn-icon">✏️</span>
                    Редактировать
                </a>
                <form action="{{ route('articles.destroy', $article) }}"
                      method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Удалить статью?')">
                        <span class="btn-icon">🗑️</span>
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .article-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #000;
            min-height: 100vh;
        }

        .article-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            color: #ccc;
            text-decoration: none;
            margin-bottom: 15px;
            transition: color 0.3s;
        }

        .btn-back:hover {
            color: #fff;
        }

        .btn-back-icon {
            margin-right: 8px;
            font-size: 18px;
        }

        .article-title-section h1 {
            color: #fff;
            font-size: 32px;
            margin: 0 0 15px 0;
        }

        .article-meta {
            display: flex;
            gap: 20px;
            color: #999;
            font-size: 14px;
        }

        .article-content {
            background: #111;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #333;
        }

        .article-rating-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        .rating-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .rating-label {
            color: #ccc;
            font-size: 16px;
        }

        .rating-value {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        .quality-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .quality-badge.popular {
            background: #272;
            color: #fff;
        }

        .quality-badge:not(.popular) {
            background: #333;
            color: #ccc;
        }

        .rating-controls {
            display: flex;
            gap: 10px;
        }

        .rating-form {
            display: inline;
        }

        .btn-rating {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-rating-plus {
            background: #272;
            color: #fff;
        }

        .btn-rating-minus {
            background: #722;
            color: #fff;
        }

        .article-description h3 {
            color: #fff;
            font-size: 20px;
            margin: 0 0 15px 0;
        }

        .article-description p {
            color: #ccc;
            font-size: 16px;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .article-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            border: 1px solid;
            transition: all 0.3s;
        }

        .btn-icon {
            margin-right: 8px;
            font-size: 16px;
        }

        .btn-edit {
            background: #332200;
            color: #ffcc00;
            border-color: #443300;
        }

        .btn-edit:hover {
            background: #443300;
            color: #ffdd33;
        }

        .btn-delete {
            background: #330000;
            color: #ff6666;
            border-color: #440000;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 15px;
        }

        .btn-delete:hover {
            background: #440000;
            color: #ff8888;
        }
    </style>
@endsection

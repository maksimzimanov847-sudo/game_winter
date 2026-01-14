@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/black-table-styles.css') }}">

    <div class="articles-container">
        <div class="articles-header">
            <h2 class="articles-title">Список статей</h2>
            <a href="{{ route('articles.create') }}" class="btn-add">
                <span class="btn-add-icon">+</span>
                Добавить статью
            </a>
        </div>

        <div class="table-wrapper">
            <table class="articles-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Рейтинг</th>
                    <th>Качество</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td class="article-id">#{{ $article->id }}</td>
                        <td class="article-title">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->getExcerpt(50) }}
                            </a>
                        </td>
                        <td class="article-author">{{ $article->getFormattedAuthor() }}</td>
                        <td class="article-rating">
                            <div class="rating-controls">
                                <span class="rating-value">{{ $article->rating }}</span>
                                <div class="rating-buttons">
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
                        </td>
                        <td class="article-quality">
                            <span class="quality-badge {{ $article->isPopular() ? 'popular' : '' }}">
                                {{ $article->getQualityLevel() }}
                            </span>
                        </td>
                        <td class="article-actions">
                            <div class="action-buttons">
                                <a href="{{ route('articles.show', $article) }}" class="btn-action btn-view">
                                    <span class="btn-icon">👁</span>
                                    Просмотр
                                </a>
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-articles">
                            <div class="no-articles-content">
                                <span class="no-articles-icon">📝</span>
                                <p>Нет статей в системе</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .articles-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            min-height: 100vh;
        }

        .rating-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-value {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            min-width: 20px;
        }

        .rating-buttons {
            display: flex;
            gap: 4px;
        }

        .rating-form {
            display: inline;
        }

        .btn-rating {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            font-size: 14px;
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

        .quality-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
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
    </style>
@endsection

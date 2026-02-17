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
                    <th>Фото</th> {{-- новый столбец --}}
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
                        <td class="article-photo-cell">
                            @if($article->mainPhoto)
                                <img src="{{ $article->mainPhoto->thumbnail_url }}"
                                     alt="Превью"
                                     class="table-photo">
                            @else
                                <div class="no-photo-placeholder">
                                    <span class="no-photo-icon">📷</span>
                                </div>
                            @endif
                        </td>
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
                        <td colspan="7" class="no-articles">
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
        :root {
            --dark-bg: #0f172a;
            --dark-bg-lighter: #1e293b;
            --dark-bg-card: #162032;
            --dark-border: #2d3748;
            --dark-text: #e2e8f0;
            --dark-text-secondary: #94a3b8;
            --dark-accent: #3b82f6;
            --dark-accent-hover: #2563eb;
            --dark-danger: #ef4444;
            --dark-danger-hover: #dc2626;
            --dark-warning: #f59e0b;
            --dark-success: #10b981;
            --dark-success-hover: #059669;
            --dark-shadow: rgba(0, 0, 0, 0.3);
            --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-overlay: rgba(15, 23, 42, 0.95);
        }

        .articles-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1rem;
            min-height: calc(100vh - 4rem);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: var(--dark-bg);
            color: var(--dark-text);
        }

        .articles-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--dark-border);
            position: relative;
        }

        .articles-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--dark-gradient);
            border-radius: 2px;
        }

        .articles-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-text);
            background: var(--dark-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--dark-gradient);
            color: white;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-add-icon {
            font-size: 1.2rem;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 1rem;
            border: 1px solid var(--dark-border);
            background: var(--dark-bg-card);
            box-shadow: 0 20px 40px var(--dark-shadow);
        }

        .articles-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .articles-table th {
            text-align: left;
            padding: 1.25rem 1rem;
            background: var(--dark-bg-lighter);
            color: var(--dark-text);
            font-weight: 600;
            font-size: 0.95rem;
            border-bottom: 2px solid var(--dark-border);
        }

        .articles-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--dark-border);
            color: var(--dark-text-secondary);
        }

        .articles-table tr:hover td {
            background: rgba(30, 41, 59, 0.5);
        }

        .article-id {
            font-weight: 600;
            color: var(--dark-accent);
        }

        .article-title a {
            color: var(--dark-text);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .article-title a:hover {
            color: var(--dark-accent);
        }

        .article-rating .rating-controls {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .rating-value {
            font-weight: 700;
            color: var(--dark-warning);
            min-width: 24px;
            text-align: center;
        }

        .rating-buttons {
            display: flex;
            gap: 0.25rem;
        }

        .btn-rating {
            width: 28px;
            height: 28px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.2s ease;
        }

        .btn-rating-plus {
            background: rgba(16, 185, 129, 0.2);
            color: var(--dark-success);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .btn-rating-plus:hover {
            background: rgba(16, 185, 129, 0.3);
            color: white;
        }

        .btn-rating-minus {
            background: rgba(239, 68, 68, 0.2);
            color: var(--dark-danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-rating-minus:hover {
            background: rgba(239, 68, 68, 0.3);
            color: white;
        }

        .quality-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid;
        }

        .quality-badge.popular {
            background: rgba(16, 185, 129, 0.15);
            color: var(--dark-success);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .quality-badge:not(.popular) {
            background: rgba(148, 163, 184, 0.15);
            color: var(--dark-text-secondary);
            border-color: rgba(148, 163, 184, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            border: 1px solid;
            transition: all 0.2s ease;
            background: transparent;
            cursor: pointer;
        }

        .btn-view {
            color: var(--dark-accent);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .btn-view:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: var(--dark-accent);
        }

        .btn-edit {
            color: var(--dark-warning);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            background: rgba(245, 158, 11, 0.1);
            border-color: var(--dark-warning);
        }

        .btn-delete {
            color: var(--dark-danger);
            border-color: rgba(239, 68, 68, 0.3);
            background: transparent;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: var(--dark-danger);
        }

        .btn-icon {
            font-size: 1rem;
        }

        .delete-form {
            margin: 0;
        }

        .no-articles {
            text-align: center;
            padding: 3rem;
        }

        .no-articles-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-text-secondary);
        }

        .no-articles-icon {
            font-size: 2rem;
            opacity: 0.5;
        }

        /* Стили для колонки с фото */
        .article-photo-cell {
            width: 80px;
            text-align: center;
        }

        .table-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--dark-border);
            transition: all 0.2s ease;
        }

        .table-photo:hover {
            border-color: var(--dark-accent);
            transform: scale(1.05);
        }

        .no-photo-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: var(--dark-bg-lighter);
            border: 2px dashed var(--dark-border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .no-photo-icon {
            font-size: 1.5rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .articles-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
@endsection

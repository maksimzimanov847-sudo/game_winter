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

        /* Заголовок и кнопки управления */
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

        .articles-controls {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* Сетка статей */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .article-card {
            background: var(--dark-bg-card);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--dark-border);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .article-card:hover {
            transform: translateY(-5px);
            border-color: var(--dark-accent);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(59, 130, 246, 0.1);
        }

        .article-card-header {
            padding: 1.5rem 1.5rem 0.5rem;
        }

        .article-category {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: rgba(59, 130, 246, 0.15);
            color: var(--dark-accent);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-text);
            margin: 0 0 0.75rem 0;
            line-height: 1.4;
        }

        .article-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .article-title a:hover {
            color: var(--dark-accent);
        }

        .article-excerpt {
            color: var(--dark-text-secondary);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-card-body {
            padding: 0 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid rgba(45, 55, 72, 0.5);
        }

        .article-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-text-secondary);
            font-size: 0.9rem;
        }

        .article-author-avatar {
            width: 28px;
            height: 28px;
            background: var(--dark-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* Контролы рейтинга */
        .rating-controls {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            border: 1px solid var(--dark-border);
        }

        .rating-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark-text);
            min-width: 28px;
            text-align: center;
            font-family: 'SF Mono', 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        }

        .rating-buttons {
            display: flex;
            gap: 0.25rem;
        }

        .rating-form {
            display: inline;
            margin: 0;
        }

        .btn-rating {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-rating::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-rating:hover::before {
            opacity: 1;
        }

        .btn-rating:active {
            transform: scale(0.95);
        }

        .btn-rating-plus {
            background: rgba(16, 185, 129, 0.2);
            color: var(--dark-success);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .btn-rating-plus:hover {
            background: rgba(16, 185, 129, 0.3);
            color: white;
            border-color: var(--dark-success);
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.3);
        }

        .btn-rating-minus {
            background: rgba(239, 68, 68, 0.2);
            color: var(--dark-danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-rating-minus:hover {
            background: rgba(239, 68, 68, 0.3);
            color: white;
            border-color: var(--dark-danger);
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
        }

        /* Бейдж качества */
        .quality-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border: 1px solid;
            transition: all 0.3s ease;
        }

        .quality-badge.popular {
            background: rgba(16, 185, 129, 0.15);
            color: var(--dark-success);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .quality-badge.popular:hover {
            background: rgba(16, 185, 129, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .quality-badge:not(.popular) {
            background: rgba(148, 163, 184, 0.15);
            color: var(--dark-text-secondary);
            border-color: rgba(148, 163, 184, 0.3);
        }

        .quality-badge:not(.popular):hover {
            background: rgba(148, 163, 184, 0.25);
            transform: translateY(-2px);
        }

        /* Статистика статьи */
        .article-stats {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(45, 55, 72, 0.5);
            color: var(--dark-text-secondary);
            font-size: 0.85rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .stat-icon {
            font-size: 1rem;
            opacity: 0.7;
        }

        /* Пустое состояние */
        .no-articles {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            background: var(--dark-bg-card);
            border-radius: 12px;
            border: 2px dashed var(--dark-border);
        }

        .no-articles-icon {
            font-size: 3rem;
            color: var(--dark-text-secondary);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .no-articles h3 {
            color: var(--dark-text);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .no-articles p {
            color: var(--dark-text-secondary);
            margin-bottom: 1.5rem;
        }

        /* Пагинация */
        .articles-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--dark-border);
        }

        .pagination-link,
        .pagination-current {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 40px;
            text-align: center;
        }

        .pagination-link {
            background: var(--dark-bg-lighter);
            color: var(--dark-text-secondary);
            border: 1px solid var(--dark-border);
        }

        .pagination-link:hover {
            background: rgba(59, 130, 246, 0.1);
            color: var(--dark-accent);
            border-color: var(--dark-accent);
            transform: translateY(-2px);
            text-decoration: none;
        }

        .pagination-current {
            background: var(--dark-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .pagination-disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        //.*$
        @media (max-width: 768px) {
            .articles-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .articles-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .articles-controls {
                width: 100%;
                justify-content: space-between;
            }

            .articles-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1rem;
            }

            .article-card-header,
            .article-card-body {
                padding: 1.25rem;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .rating-controls {
                align-self: stretch;
                justify-content: space-between;
            }
        }

        @media (max-width: 480px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .articles-title {
                font-size: 1.5rem;
            }

            .rating-controls {
                flex-wrap: wrap;
            }

            .quality-badge {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }
        }

        /* Анимации */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article-card {
            animation: fadeIn 0.5s ease-out forwards;
        }

    </style>
@endsection

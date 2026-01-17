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
            --dark-warning: #f59e0b;
            --dark-success: #10b981;
            --dark-shadow: rgba(0, 0, 0, 0.3);
            --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .article-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
            min-height: calc(100vh - 4rem);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: var(--dark-bg);
            color: var(--dark-text);
        }

        .article-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--dark-border);
            position: relative;
        }

        .article-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--dark-gradient);
            border-radius: 2px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-text-secondary);
            text-decoration: none;
            margin-bottom: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--dark-border);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-back:hover {
            color: var(--dark-text);
            background: var(--dark-bg-lighter);
            border-color: var(--dark-accent);
            transform: translateX(-5px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            text-decoration: none;
        }

        .btn-back-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-back:hover .btn-back-icon {
            transform: translateX(-3px);
        }

        .article-title-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-text);
            margin: 0 0 1rem 0;
            line-height: 1.2;
            background: var(--dark-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
        }

        .article-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--dark-text-secondary);
            font-size: 0.95rem;
            flex-wrap: wrap;
        }

        .article-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-meta span::before {
            content: '•';
            color: var(--dark-accent);
            font-size: 1.2rem;
        }

        .article-content {
            background: var(--dark-bg-card);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--dark-border);
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article-rating-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--dark-border);
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .rating-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .rating-label {
            color: var(--dark-text-secondary);
            font-size: 1rem;
            font-weight: 500;
        }

        .rating-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-text);
            font-family: 'SF Mono', 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .quality-badge {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            border-radius: 25px;
            font-size: 0.9rem;
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
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        }

        .quality-badge.popular:hover {
            background: rgba(16, 185, 129, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.25);
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

        .rating-controls {
            display: flex;
            gap: 0.75rem;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            border: 1px solid var(--dark-border);
        }

        .rating-form {
            display: inline;
            margin: 0;
        }

        .btn-rating {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
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

        .article-description h3 {
            color: var(--dark-text);
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 1.5rem 0;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .article-description h3::before {
            content: '📝';
            font-size: 1.2rem;
            opacity: 0.7;
        }

        .article-description p {
            color: var(--dark-text-secondary);
            font-size: 1.1rem;
            line-height: 1.8;
            white-space: pre-wrap;
            margin: 0;
            padding: 1rem;
            background: rgba(30, 41, 59, 0.3);
            border-radius: 8px;
            border-left: 3px solid var(--dark-accent);
        }

        .article-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--dark-border);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0.875rem 1.75rem;
            text-decoration: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            border: 1px solid;
            transition: all 0.3s ease;
            min-width: 140px;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.15);
            color: var(--dark-accent);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            background: rgba(59, 130, 246, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
            text-decoration: none;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: var(--dark-danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 1rem;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        //.*$
        @media (max-width: 768px) {
            .article-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .article-title-section h1 {
                font-size: 2rem;
            }

            .article-content {
                padding: 1.5rem;
            }

            .article-rating-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }

            .rating-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .article-meta {
                flex-direction: column;
                gap: 0.75rem;
            }

            .article-actions {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .article-title-section h1 {
                font-size: 1.5rem;
            }

            .rating-value {
                font-size: 1.75rem;
            }

            .quality-badge {
                font-size: 0.8rem;
                padding: 0.4rem 1rem;
            }

            .btn-rating {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }

            .article-description p {
                font-size: 1rem;
                padding: 0.75rem;
            }

            .btn-action {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
                min-width: auto;
            }
        }


        @keyframes pulseRating {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .btn-rating:active {
            animation: pulseRating 0.2s ease;
        }

        /* Стили для фона страницы */
        .article-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        /* Стили для форм в действиях */
        form {
            margin: 0;
        }
    </style>
@endsection

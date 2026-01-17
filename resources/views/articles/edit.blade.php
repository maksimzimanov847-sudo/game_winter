@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <a href="{{ route('articles.index') }}" class="btn-back">
                <span class="btn-back-icon">←</span>
                Назад к списку статей
            </a>
            <h1>Редактирование статьи</h1>
        </div>

        <form method="POST" action="{{ route('articles.update', $article) }}" class="article-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">Название *</label>
                <input value="{{ old('title', $article->title) }}"
                       type="text"
                       class="form-input"
                       id="title"
                       name="title"
                       placeholder="Введите название статьи"
                       required
                       maxlength="15000">
                @error('title')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="author" class="form-label">Автор *</label>
                <input value="{{ old('author', $article->author) }}"
                       type="text"
                       class="form-input"
                       id="author"
                       name="author"
                       placeholder="Введите имя автора"
                       required
                       maxlength="255">
                @error('author')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="rating" class="form-label">Рейтинг (0-10) *</label>
                <input value="{{ old('rating', $article->rating) }}"
                       type="number"
                       class="form-input"
                       id="rating"
                       name="rating"
                       min="0"
                       max="10"
                       placeholder="Введите рейтинг от 0 до 10"
                       required>
                @error('rating')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Описание *</label>
                <textarea class="form-input"
                          id="description"
                          name="description"
                          placeholder="Введите описание статьи"
                          rows="6"
                          required>{{ old('description', $article->description) }}</textarea>
                @error('description')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <span class="btn-icon">✓</span>
                    Обновить статью
                </button>
                <a href="{{ route('articles.index') }}" class="btn-cancel">
                    Отмена
                </a>
            </div>
        </form>
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

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: var(--dark-bg);
            min-height: 100vh;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--dark-border);
            position: relative;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 3px;
            background: var(--dark-gradient);
            border-radius: 2px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--dark-text-secondary);
            text-decoration: none;
            margin-bottom: 1.5rem;
            padding: 0.75rem 1rem;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            width: fit-content;
        }

        .btn-back:hover {
            color: var(--dark-text);
            background: rgba(30, 41, 59, 0.8);
            border-color: var(--dark-accent);
            transform: translateX(-5px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .btn-back-icon {
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .btn-back:hover .btn-back-icon {
            transform: translateX(-3px);
        }

        .form-header h1 {
            color: var(--dark-text);
            font-size: 2.5rem;
            margin: 0;
            font-weight: 700;
            background: var(--dark-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
        }

        .article-form {
            background: var(--dark-bg-card);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 40px var(--dark-shadow);
            border: 1px solid var(--dark-border);
            backdrop-filter: blur(10px);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 1.75rem;
            animation: fadeIn 0.5s ease-out forwards;
            animation-delay: calc(var(--order, 0) * 0.1s);
        }

        .form-group:nth-child(1) { --order: 1; }
        .form-group:nth-child(2) { --order: 2; }
        .form-group:nth-child(3) { --order: 3; }
        .form-group:nth-child(4) { --order: 4; }

        .form-label {
            display: block;
            color: var(--dark-text-secondary);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label::after {
            content: '✱';
            color: var(--dark-accent);
            font-size: 0.8rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--dark-text);
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .form-input::placeholder {
            color: var(--dark-text-secondary);
            opacity: 0.7;
        }

        .form-input:focus {
            border-color: var(--dark-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background: rgba(30, 41, 59, 0.9);
            transform: translateY(-1px);
        }

        textarea.form-input {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
            font-family: inherit;
        }

        #rating {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'%3E%3C/polygon%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            padding-right: 3rem;
        }

        .error-message {
            color: var(--dark-danger);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            padding: 0.75rem;
            background: rgba(239, 68, 68, 0.1);
            border-radius: 8px;
            border-left: 3px solid var(--dark-danger);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-message::before {
            content: '⚠️';
            font-size: 0.9rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--dark-border);
            flex-wrap: wrap;
        }

        .btn-submit {
            flex: 1;
            padding: 1rem 2rem;
            background: var(--dark-gradient);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            min-width: 180px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-icon {
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .btn-submit:hover .btn-icon {
            transform: scale(1.2);
        }

        .btn-cancel {
            padding: 1rem 2rem;
            background: rgba(148, 163, 184, 0.15);
            border: 1px solid rgba(148, 163, 184, 0.3);
            border-radius: 10px;
            color: var(--dark-text-secondary);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: rgba(148, 163, 184, 0.25);
            color: var(--dark-text);
            border-color: var(--dark-border);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }

            .article-form {
                padding: 1.75rem;
                margin: 0.5rem;
            }

            .form-header h1 {
                font-size: 2rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn-submit, .btn-cancel {
                width: 100%;
                justify-content: center;
            }

            .btn-back {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .article-form {
                padding: 1.5rem;
            }

            .form-header h1 {
                font-size: 1.75rem;
            }

            .form-input {
                padding: 0.875rem 1rem;
                font-size: 0.95rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .btn-submit, .btn-cancel {
                padding: 0.875rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 20px 40px var(--dark-shadow);
            }
            50% {
                box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
            }
        }

        .article-form {
            animation: fadeIn 0.6s ease-out, glow 3s ease-in-out 0.6s;
        }

        #name {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'%3E%3C/path%3E%3Ccircle cx='12' cy='7' r='4'%3E%3C/circle%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            padding-right: 3rem;
        }

        #author {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'%3E%3C/path%3E%3Ccircle cx='9' cy='7' r='4'%3E%3C/circle%3E%3Cpath d='M23 21v-2a4 4 0 0 0-3-3.87'%3E%3C/path%3E%3Cpath d='M16 3.13a4 4 0 0 1 0 7.75'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            padding-right: 3rem;
        }

        #description {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'%3E%3C/path%3E%3Cpolyline points='14 2 14 8 20 8'%3E%3C/polyline%3E%3Cline x1='16' y1='13' x2='8' y2='13'%3E%3C/line%3E%3Cline x1='16' y1='17' x2='8' y2='17'%3E%3C/line%3E%3Cpolyline points='10 9 9 9 8 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem top 1rem;
            background-size: 20px;
            padding-right: 3rem;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .btn-submit:active {
            animation: pulse 0.3s ease;
        }
    </style>
@endsection

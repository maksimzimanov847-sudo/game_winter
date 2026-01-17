@extends('layouts.app')

@section('title', 'Создание статьи')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <a href="{{ route('articles.index') }}" class="btn-back">
                <span class="btn-back-icon">←</span>
                Назад к списку статей
            </a>
            <h1>Создание новой статьи</h1>
        </div>

        <form method="POST" action="{{ route('articles.store') }}" class="article-form">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Название *</label>
                <input value="{{ old('title') }}"
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
                <input value="{{ old('author') }}"
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
                <input value="{{ old('rating', 0) }}"
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
                          required>{{ old('description') }}</textarea>
                @error('description')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <span class="btn-icon">✓</span>
                    Создать статью
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
            margin: 2rem auto;
            padding: 0 1rem;
            min-height: calc(100vh - 4rem);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: var(--dark-bg);
            color: var(--dark-text);
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

        .form-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-text);
            margin: 0;
            background: var(--dark-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
        }

        .article-form {
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

        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-text);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .form-label::before {
            content: '•';
            color: var(--dark-accent);
            font-size: 1.2rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--dark-text);
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-input::placeholder {
            color: var(--dark-text-secondary);
            opacity: 0.7;
        }

        .form-input:focus {
            border-color: var(--dark-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background: rgba(30, 41, 59, 0.8);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        textarea.form-input {
            resize: vertical;
            min-height: 150px;
            font-family: inherit;
            line-height: 1.5;
        }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.25rem;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        select.form-input option {
            background: var(--dark-bg-card);
            color: var(--dark-text);
            padding: 0.75rem;
        }

        .error-message {
            color: var(--dark-danger);
            font-size: 0.9rem;
            margin-top: 0.5rem;
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
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%);
        }

        .btn-cancel {
            padding: 1rem 2rem;
            background: rgba(148, 163, 184, 0.15);
            border: 1px solid rgba(148, 163, 184, 0.3);
            border-radius: 10px;
            color: var(--dark-text-secondary);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-cancel:hover {
            background: rgba(148, 163, 184, 0.25);
            color: var(--dark-text);
            border-color: var(--dark-border);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
            text-decoration: none;
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        /* Стили для звездного рейтинга в опциях */
        .star-options {
            display: flex;
            gap: 0.25rem;
            margin-top: 0.25rem;
        }

        .star-option {
            color: var(--dark-warning);
            font-size: 1.2rem;
        }

        /* Индикатор валидации */
        .form-input:valid {
            border-color: rgba(16, 185, 129, 0.3);
            background: rgba(16, 185, 129, 0.05);
        }

        .form-input:invalid:not(:placeholder-shown) {
            border-color: rgba(239, 68, 68, 0.3);
            background: rgba(239, 68, 68, 0.05);
        }

        //.*$
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .form-header {
                margin-bottom: 2rem;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .article-form {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
                justify-content: center;
            }

            .btn-back {
                padding: 0.75rem 1rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .article-form {
                padding: 1.25rem;
                border-radius: 12px;
            }

            .form-header h1 {
                font-size: 1.5rem;
            }

            .form-input {
                padding: 0.875rem 1rem;
                font-size: 0.95rem;
            }

            .btn-submit,
            .btn-cancel {
                padding: 0.875rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        /* Дополнительные эффекты при наведении на группу */
        .form-group:hover .form-label {
            color: var(--dark-accent);
        }

        .form-group:hover .form-label::before {
            color: var(--dark-success);
        }

        /* Стили для фона страницы */
        body.bg-gray-50::before {
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
    </style>

@endsection

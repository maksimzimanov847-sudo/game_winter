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
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #000;
            min-height: 100vh;
        }

        .form-header {
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

        .form-header h1 {
            color: #fff;
            font-size: 28px;
            margin: 0;
        }

        .article-form {
            background: #111;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #333;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #ccc;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 6px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

        .form-input:focus {
            outline: none;
            border-color: #555;
            box-shadow: 0 0 0 2px rgba(85, 85, 85, 0.1);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        .btn-submit {
            flex: 1;
            padding: 14px 24px;
            background: linear-gradient(135deg, #222 0%, #111 100%);
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #333 0%, #222 100%);
            border-color: #555;
        }

        .btn-icon {
            font-size: 18px;
        }

        .btn-cancel {
            padding: 14px 24px;
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 6px;
            color: #ccc;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background: #222;
            color: #fff;
            border-color: #444;
        }
    </style>
@endsection

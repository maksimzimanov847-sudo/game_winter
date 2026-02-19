@extends('layouts.game')

@section('title', 'Game zone — Статьи')

@section('content')
    {{-- Hero секция --}}
    <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 text-white rounded-2xl mb-12 overflow-hidden shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    Добро пожаловать в <span class="text-blue-200">Game zone</span>!
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Читайте свежие статьи, обзоры, гайды и оставляйте свои отзывы
                </p>
                <div class="max-w-2xl mx-auto">
                    <form action="{{ route('articles.search') }}" method="GET" class="relative group">
                        <input
                            type="text"
                            name="query"
                            value="{{ request('query') }}"
                            placeholder="Поиск статей по названию или автору…"
                            class="w-full px-6 py-4 rounded-xl text-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 shadow-lg transition duration-300"
                        >
                        <button
                            type="submit"
                            class="absolute right-3 top-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                        >
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Найти
                            </div>
                        </button>
                    </form>
    <div class="container-custom">
        <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-700">
            <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Последние статьи
            </h2>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                Все статьи →
            </a>
        </div>
        <a href="{{ route('articles.create') }}" class="btn-add">
            <span class="btn-add-icon">+</span>
            Добавить статью
        </a>
        @forelse($articles as $article)
            <div class="card mb-8 fade-in">
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-4">
                    <div>
                        <h3 class="text-2xl font-bold text-white hover:text-blue-400 transition">
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h3>
                        <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $article->author }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $article->created_at->format('d.m.Y') }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                {{ $article->rating }}/10
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary text-sm py-2 px-5">
                        Читать статью
                    </a>
                </div>

                {{-- Отображение главного фото статьи --}}
                @if($article->mainPhoto)
                    <div class="article-image mb-4">
                        <img src="{{ $article->mainPhoto->thumbnail_url }}"
                             alt="{{ $article->title }}"
                             class="rounded-lg w-full object-cover"
                             style="max-height: 300px;">
                    </div>
                @endif

                <p class="text-gray-300 mb-6 line-clamp-3">
                    {{ $article->description }}
                </p>

                <div class="border-t border-gray-700 pt-5 mt-2">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4z"></path>
                            </svg>
                            Отзывы ({{ $article->reviews->count() }})
                        </h4>
                    </div>

                    {{-- Список отзывов --}}
                    <div class="space-y-4 mb-6">
                        @forelse($article->reviews->take(3) as $review)
                            <div class="bg-gray-800/30 rounded-lg p-4 border-l-4 border-blue-500">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium text-white">{{ $review->user->name }}</span>
                                        <span class="text-sm text-gray-400">·</span>
                                        <div class="flex items-center gap-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-300 text-sm">{{ $review->comment ?: 'Пользователь не оставил комментарий.' }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic text-sm">Пока нет отзывов. Будьте первым!</p>
                        @endforelse

                        @if($article->reviews->count() > 3)
                            <a href="{{ route('articles.show', $article) }}#reviews" class="text-blue-400 hover:text-blue-300 text-sm flex items-center gap-1 transition">
                                Показать все {{ $article->reviews->count() }} отзывов
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif
                    </div>

                    {{-- Форма добавления отзыва --}}
                    @auth
                        @if(!isset($userReviewMap[$article->id]))
                            <div class="bg-gray-800/50 rounded-lg p-5 border border-gray-700">
                                <h5 class="text-md font-medium text-white mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Ваш отзыв
                                </h5>
                                <form action="{{ route('reviews.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">

                                    <div class="mb-4">
                                        <label class="form-label text-sm">Оценка</label>
                                        <div class="flex items-center gap-3 flex-wrap">
                                            @for($i = 1; $i <= 5; $i++)
                                                <label class="flex items-center gap-1 cursor-pointer group">
                                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                                    <span class="text-2xl text-gray-500 peer-checked:text-yellow-400 group-hover:text-yellow-400 transition">★</span>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="comment-{{ $article->id }}" class="form-label text-sm">Комментарий (необязательно)</label>
                                        <textarea name="comment" id="comment-{{ $article->id }}" rows="2" class="form-control text-sm" placeholder="Ваши впечатления..."></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary text-sm py-2 px-5">
                                        Отправить отзыв
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="bg-blue-900/20 border border-blue-800 rounded-lg p-3 text-sm text-blue-300 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-5m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Вы уже оставили отзыв на эту статью.
                                <a href="{{ route('reviews.edit', $article->reviews->where('user_id', auth()->id())->first()) }}" class="text-blue-400 hover:text-blue-300 underline ml-1">
                                    Редактировать
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="bg-gray-800/30 border border-gray-700 rounded-lg p-4 text-center text-gray-400">
                            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 underline">Войдите</a>, чтобы оставить отзыв.
                        </div>
                    @endauth
                </div>
            </div>
        @empty
            <div class="card text-center py-16">
                <svg class="w-24 h-24 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="text-2xl font-semibold text-white mb-2">Статьи пока не добавлены</h3>
                <p class="text-gray-400 mb-6">Загляните позже или напишите свою первую статью!</p>
                @can('create', App\Models\Article::class)
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">
                        Написать статью
                    </a>
                @endcan
            </div>
        @endforelse
    </div>
    @if($articles->hasPages())
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                {{ $articles->links() }}
            </nav>
        </div>
    @endif

    <style>
        /* ===== Тёмная тема для проекта ===== */
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

        body {
            background: var(--dark-bg);
            color: var(--dark-text);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            position: relative;
            line-height: 1.5;
        }

        body::before {
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
            pointer-events: none;
        }

        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
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

        .fade-in {
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .card {
            background: var(--dark-bg-card);
            border: 1px solid var(--dark-border);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 20px 40px var(--dark-shadow);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--dark-accent);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            transform: translateY(-2px);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--dark-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(148, 163, 184, 0.15);
            color: var(--dark-text-secondary);
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(148, 163, 184, 0.25);
            color: var(--dark-text);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
        }

        /* Стили для изображения статьи */
        .article-image {
            overflow: hidden;
            border-radius: 0.75rem;
            border: 1px solid var(--dark-border);
            transition: all 0.3s ease;
        }

        .article-image img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .article-image:hover img {
            transform: scale(1.02);
        }

        /* Остальные стили (для форм, рейтинга и т.д.) можно оставить как есть или дополнить */
        .form-label {
            display: block;
            color: var(--dark-text);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--dark-border);
            border-radius: 0.5rem;
            color: var(--dark-text);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--dark-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .btn-add{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            text-decoration: none;
            white-space: nowrap;
            background: var(--dark-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
    </style>
@endsection

@extends('layouts.game')

@section('title', 'О нас — Game zone')

@section('content')

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
    </style>


    <div class="container-custom">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                О нас
            </h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Game zone — это сообщество любителей игр, где каждый может найти интересные статьи, обзоры и поделиться своим мнением.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">

            <div class="card fade-in">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Наша миссия</h2>
                </div>
                <p class="text-gray-300 leading-relaxed">
                    Мы создаём платформу, где каждый геймер может найти полезные материалы, обсудить любимые игры и открыть для себя что-то новое. Мы верим, что игры объединяют людей, и хотим сделать это общение максимально комфортным и интересным.
                </p>
            </div>


            <div class="card fade-in">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Наши ценности</h2>
                </div>
                <ul class="text-gray-300 space-y-2">
                    <li class="flex items-start gap-2">
                        <span class="text-blue-400 mt-1">•</span>
                        <span>Открытость и честность в каждом отзыве</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-400 mt-1">•</span>
                        <span>Уважение к мнению каждого пользователя</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-400 mt-1">•</span>
                        <span>Качественный и полезный контент</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-400 mt-1">•</span>
                        <span>Постоянное развитие и улучшение</span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="card fade-in mb-12">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-5m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Почему выбирают Game zone
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-1">Актуальные статьи</h3>
                    <p class="text-sm text-gray-400">Свежие обзоры и гайды от опытных авторов</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-1">Честные отзывы</h3>
                    <p class="text-sm text-gray-400">Реальные мнения игроков без цензуры</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-1">Активное сообщество</h3>
                    <p class="text-sm text-gray-400">Тысячи игроков делятся опытом каждый день</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-5m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-1">Безопасность</h3>
                    <p class="text-sm text-gray-400">Модерация и защита от спама</p>
                </div>
            </div>
        </div>


        <div class="card fade-in mb-12">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Наша команда
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="text-center">
                    <img src="/app/t/2.jpg" alt="Зиманов" class="w-24 h-24 rounded-full mx-auto mb-3 border-2 border-blue-500">
                    <h3 class="text-lg font-semibold text-white">Зиманов Максим
                    </h3>
                    <p class="text-sm text-gray-400">Основатель, главный редактор</p>
                </div>
                <div class="text-center">
                    <img src="/app/t/1.jpg" alt="Мария" class="w-24 h-24 rounded-full mx-auto mb-3 border-2 border-blue-500">
                    <h3 class="text-lg font-semibold text-white">Мария Петрова</h3>
                    <p class="text-sm text-gray-400">Автор статей, обозреватель</p>
                </div>
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Дмитрий" class="w-24 h-24 rounded-full mx-auto mb-3 border-2 border-blue-500">
                    <h3 class="text-lg font-semibold text-white">Дмитрий Соколов</h3>
                    <p class="text-sm text-gray-400">Технический директор</p>
                </div>
            </div>
        </div>


        <div class="text-center">
            <a href="{{ route('game.index') }}" class="btn btn-primary px-8 py-3">
                Перейти к статьям
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
@endsection

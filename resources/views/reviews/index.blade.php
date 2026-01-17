@extends('layouts.app')

@section('title', 'Статьи')

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
            --dark-warning: #f59e0b;
            --dark-success: #10b981;
            --dark-shadow: rgba(0, 0, 0, 0.3);
            --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body.bg-gray-50 {
            background: var(--dark-bg) !important;
            color: var(--dark-text) !important;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            min-height: 100vh;
        }

        .container.mx-auto.px-4.py-8 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Заголовок и кнопка добавления */
        .flex.justify-between.items-center.mb-6 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--dark-border);
            position: relative;
        }

        .flex.justify-between.items-center.mb-6::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--dark-gradient);
            border-radius: 2px;
        }

        .text-3xl.font-bold.text-gray-800 {
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

        .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg {
            background: var(--dark-gradient) !important;
            color: white !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 8px !important;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            text-decoration: none;
        }

        /* Сообщение об успехе */
        .bg-green-100.border.border-green-400.text-green-700.px-4.py-3.rounded.mb-6 {
            background: rgba(16, 185, 129, 0.15) !important;
            border: 1px solid rgba(16, 185, 129, 0.3) !important;
            color: var(--dark-success) !important;
            padding: 1rem !important;
            border-radius: 8px !important;
            margin-bottom: 1.5rem !important;
            backdrop-filter: blur(10px);
        }

        /* Контейнер отзывов */
        .bg-white.shadow.overflow-hidden.sm\:rounded-md {
            background: var(--dark-bg-card) !important;
            border-radius: 12px !important;
            overflow: hidden;
            border: 1px solid var(--dark-border);
            box-shadow: 0 8px 32px var(--dark-shadow) !important;
        }

        /* Список отзывов */
        .divide-y.divide-gray-200 {
            border-color: var(--dark-border) !important;
        }

        .divide-y > * {
            border-color: inherit;
        }

        /* Элемент отзыва */
        .px-6.py-4 {
            padding: 1.5rem !important;
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--dark-border);
        }

        .px-6.py-4:hover {
            background: rgba(30, 41, 59, 0.3);
        }

        .flex.items-center.justify-between {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
        }

        /* Заголовок отзыва */
        .text-lg.font-medium.text-gray-900 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-text) !important;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        /* Мета-информация */
        .mt-2.flex.items-center.text-sm.text-gray-500 {
            margin-top: 0.75rem !important;
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            color: var(--dark-text-secondary) !important;
        }

        .mr-4 {
            margin-right: 0 !important;
        }

        /* Звезды рейтинга */
        .flex.items-center {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .fas.fa-star {
            color: var(--dark-warning) !important;
        }

        .fas.fa-star-regular {
            color: var(--dark-border) !important;
        }

        .text-yellow-400 {
            color: var(--dark-warning) !important;
        }

        .ml-2 {
            margin-left: 0.5rem !important;
            color: var(--dark-text-secondary);
            font-weight: 500;
        }

        .ml-4 {
            margin-left: 1rem !important;
            color: var(--dark-text-secondary);
        }

        /* Действия с отзывом */
        .flex.space-x-2 {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .text-blue-600.hover\:text-blue-800,
        .text-yellow-600.hover\:text-yellow-800,
        .text-red-600.hover\:text-red-800 {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .text-blue-600.hover\:text-blue-800 {
            background: rgba(59, 130, 246, 0.15);
            color: var(--dark-accent) !important;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .text-blue-600.hover\:text-blue-800:hover {
            background: rgba(59, 130, 246, 0.25);
            color: white !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            text-decoration: none;
        }

        .text-yellow-600.hover\:text-yellow-800 {
            background: rgba(245, 158, 11, 0.15);
            color: var(--dark-warning) !important;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .text-yellow-600.hover\:text-yellow-800:hover {
            background: rgba(245, 158, 11, 0.25);
            color: white !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
            text-decoration: none;
        }

        .text-red-600.hover\:text-red-800 {
            background: rgba(239, 68, 68, 0.15);
            color: var(--dark-danger) !important;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .text-red-600.hover\:text-red-800:hover {
            background: rgba(239, 68, 68, 0.25);
            color: white !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
            text-decoration: none;
        }

        /* Форма удаления */
        form.inline {
            margin: 0;
            display: inline;
        }

        /* Состояние пустого списка */
        .px-6.py-12.text-center {
            padding: 3rem 1.5rem !important;
            text-align: center;
        }

        .text-gray-500 {
            color: var(--dark-text-secondary) !important;
            font-size: 1.1rem;
        }

        /* Пагинация */
        .mt-6 {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--dark-border);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0.5rem 1rem;
            background: var(--dark-bg-lighter);
            color: var(--dark-text-secondary);
            border: 1px solid var(--dark-border);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .page-item .page-link:hover {
            background: rgba(59, 130, 246, 0.1);
            color: var(--dark-accent);
            border-color: var(--dark-accent);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            text-decoration: none;
        }

        .page-item.active .page-link {
            background: var(--dark-gradient);
            color: white !important;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
            background: var(--dark-bg);
        }

        .page-item.disabled:hover {
            transform: none;
            box-shadow: none;
            background: var(--dark-bg);
            border-color: var(--dark-border);
            color: var(--dark-text-secondary);
        }


            .pagination {
                flex-wrap: wrap;
            }


        /* Анимации */
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

        .px-6.py-4 {
            animation: fadeIn 0.3s ease forwards;
        }

        .px-6.py-4:nth-child(1) { animation-delay: 0.1s; }
        .px-6.py-4:nth-child(2) { animation-delay: 0.2s; }
        .px-6.py-4:nth-child(3) { animation-delay: 0.3s; }
    </style>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Отзывы</h1>
            <a href="{{ route('reviews.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Добавить отзыв
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($reviews as $review)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ $review->title }}</h3>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <span class="mr-4">{{ $review->author }}</span>
                                    <span class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-regular' }} text-yellow-400"></i>
                                        @endfor
                                    <span class="ml-2">{{ $review->rating }}/5</span>
                                </span>
                                    <span class="ml-4">{{ $review->created_at->format('d.m.Y') }}</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('reviews.show', $review) }}"
                                   class="text-blue-600 hover:text-blue-800">
                                    Просмотреть
                                </a>
                                <a href="{{ route('reviews.edit', $review) }}"
                                   class="text-yellow-600 hover:text-yellow-800">
                                    Редактировать
                                </a>
                                <form action="{{ route('reviews.destroy', $review) }}"
                                      method="POST"
                                      onsubmit="return confirm('Вы уверены?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="px-6 py-12 text-center">
                        <p class="text-gray-500">Нет отзывов</p>
                    </li>
                @endforelse
            </ul>
        </div>

        @if($reviews->hasPages())
            <div class="mt-6">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
@endsection

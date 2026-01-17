@extends('layouts.game')

@section('title', 'Каталог товаров — Зиманушка')

@section('content')
    <div class="bg-gradient-to-r from-purple-600 via-purple-700 to-indigo-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">
                    Добро пожаловать на <span class="text-purple-200">GameZone</span>!
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Самые свежие игровые новости, обзоры и гайды для настоящих геймеров!
                </p>
                <div class="max-w-2xl mx-auto">
                    <div class="relative group">
                        <input
                            type="text"
                            placeholder="Поиск по играм, платформам или авторам…"
                            class="w-full px-6 py-4 rounded-xl text-gray-900 focus:outline-none focus:ring-4 focus:ring-purple-300 focus:ring-opacity-50 shadow-lg transition duration-300"
                        >
                        <button
                            class="absolute right-3 top-3 bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                        >
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Найти
                            </div>
                        </button>
                    </div>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <span class="text-sm text-purple-200">Популярные теги:</span>
                        <a href="#" class="text-sm bg-purple-500 hover:bg-purple-400 text-white px-3 py-1 rounded-full transition duration-200">PC</a>
                        <a href="#" class="text-sm bg-purple-500 hover:bg-purple-400 text-white px-3 py-1 rounded-full transition duration-200">PlayStation</a>
                        <a href="#" class="text-sm bg-purple-500 hover:bg-purple-400 text-white px-3 py-1 rounded-full transition duration-200">Xbox</a>
                        <a href="#" class="text-sm bg-purple-500 hover:bg-purple-400 text-white px-3 py-1 rounded-full transition duration-200">Nintendo</a>
                        <a href="#" class="text-sm bg-purple-500 hover:bg-purple-400 text-white px-3 py-1 rounded-full transition duration-200">Киберспорт</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Последние игровые новости</h2>
                <p class="text-gray-600 max-w-2xl">
                    Самые свежие обзоры игр, новости индустрии и эксклюзивные материалы для настоящих геймеров.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <select class="px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 shadow-sm">
                    <option value="newest" selected>Сначала новые</option>
                    <option value="popular">По популярности</option>
                    <option value="rating">По рейтингу</option>
                    <option value="views">По просмотрам</option>
                    <option value="comments">По комментариям</option>
                </select>

                <select class="px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 shadow-sm">
                    <option value="all" selected>Все платформы</option>
                    <option value="pc">PC</option>
                    <option value="ps5">PlayStation 5</option>
                    <option value="xbox">Xbox Series</option>
                    <option value="switch">Nintendo Switch</option>
                    <option value="mobile">Мобильные</option>
                </select>
            </div>
        </div>

        <!-- Используем @forelse вместо @if($articles->isEmpty()) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 ease-out transform hover:-translate-y-2 overflow-hidden border border-gray-100 group">
                    <!-- Изображение статьи -->
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-indigo-600 relative overflow-hidden">
                        <!-- Бейдж категории/платформы -->
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-900/70 text-white backdrop-blur-sm">
                                @switch(rand(1,5))
                                    @case(1) PC @break
                                    @case(2) PlayStation @break
                                    @case(3) Xbox @break
                                    @case(4) Nintendo @break
                                    @case(5) Мобильные @break
                                @endswitch
                            </span>
                        </div>

                        <!-- Кнопка избранного -->
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 rounded-full bg-gray-900/50 hover:bg-gray-900/70 backdrop-blur-sm shadow-md flex items-center justify-center transition duration-200 group-hover:scale-110">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Эффект при наведении -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <div class="bg-black/40 backdrop-blur-sm w-full h-full flex items-center justify-center">
                                <a href="{{ route('articles.show', $article) }}" class="bg-white text-purple-600 font-semibold px-6 py-2.5 rounded-lg shadow-lg hover:bg-purple-50 transition duration-200">
                                    Читать статью
                                </a>
                            </div>
                        </div>

                        <!-- Заголовок на изображении -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                            <h3 class="text-lg font-bold text-white line-clamp-2">
                                {{ $article->title }}
                            </h3>
                        </div>
                    </div>

                    <!-- Контент статьи -->
                    <div class="p-6">
                        <!-- Мета-информация -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $article->created_at->diffForHumans() }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ number_format($article->views ?? rand(100, 5000)) }}
                                </span>
                            </div>

                            <!-- Рейтинг -->
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 mr-2">
                                    @php
                                        $rating = $article->rating ?? rand(3, 5);
                                    @endphp
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 {{ $i < $rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-500">{{ $rating }}/5</span>
                            </div>
                        </div>

                        <!-- Автор -->
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-400 to-indigo-500 flex items-center justify-center text-white font-bold text-sm mr-3">
                                {{ substr($article->getFormattedAuthor() ?? 'Автор', 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $article->getFormattedAuthor() ?? 'Анонимный автор' }}</p>
                                <p class="text-xs text-gray-500">Игровой журналист</p>
                            </div>
                        </div>

                        <!-- Краткое описание -->
                        <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                            {{ $article->getExcerpt(120) ?? 'Описание отсутствует' }}
                        </p>

                        <!-- Качество статьи -->
                        <div class="mb-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                @if($article->isPopular())
                                    bg-green-100 text-green-800
                                @elseif($article->rating >= 5)
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-red-100 text-red-800
                                @endif">
                                @if($article->isPopular())
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                                {{ $article->getQualityLevel() ?? 'Средняя' }}
                            </span>
                        </div>

                        <!-- Кнопки действий -->
                        <div class="flex gap-3">
                            <a href="{{ route('articles.show', $article) }}" class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-0.5 text-center">
                                Читать далее
                            </a>
                            <div class="flex gap-2">
                                <!-- Кнопка рейтинга + -->
                                <form action="{{ route('articles.incrementRating', $article) }}" method="POST" class="rating-form">
                                    @csrf
                                    <button type="submit" class="w-12 h-12 border border-gray-300 hover:border-green-400 hover:bg-green-50 rounded-lg flex items-center justify-center transition duration-200" title="Повысить рейтинг">
                                        <svg class="w-5 h-5 text-gray-600 hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    </button>
                                </form>

                                <!-- Кнопка рейтинга - -->
                                <form action="{{ route('articles.decrementRating', $article) }}" method="POST" class="rating-form">
                                    @csrf
                                    <button type="submit" class="w-12 h-12 border border-gray-300 hover:border-red-400 hover:bg-red-50 rounded-lg flex items-center justify-center transition duration-200" title="Понизить рейтинг">
                                        <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Блок для пустого состояния -->
                <div class="col-span-full">
                    <div class="text-center py-20 bg-gradient-to-b from-purple-50 to-white rounded-2xl border border-purple-100">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-r from-purple-100 to-indigo-100 mb-6">
                            <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Статьи не найдены</h3>
                        <p class="text-gray-600 max-w-md mx-auto mb-8">
                            В данный момент статьи отсутствуют. Попробуйте изменить параметры фильтрации или загляните позже.
                        </p>
                        <a href="{{ route('articles.create') }}" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Добавить первую статью
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Пагинация (только если есть статьи) -->
        @if($articles->isNotEmpty() && $articles->hasPages())
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    {{ $articles->links() }}
                </nav>
            </div>
        @endif

        <!-- Баннер подписки (только если есть статьи) -->
        @if($articles->isNotEmpty())
            <div class="mt-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl overflow-hidden shadow-xl">
                <div class="p-8 md:p-12 flex flex-col md:flex-row items-center justify-between">
                    <div class="text-white mb-6 md:mb-0 md:mr-8">
                        <h3 class="text-2xl font-bold mb-2">Подпишись на игровые новости!</h3>
                        <p class="text-purple-100 mb-4">Получай первым эксклюзивные обзоры и новости игровой индустрии</p>
                        <p class="text-sm text-purple-200">Без спама, только самое важное</p>
                    </div>
                    <button class="bg-white text-purple-600 hover:bg-purple-50 font-bold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                        Подписаться
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .rating-form {
            display: inline;
        }

        .rating-form button {
            outline: none;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

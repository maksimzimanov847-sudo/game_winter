@extends('layouts.app')

@section('title', 'Отзывы')

@section('content')
    <div class="container-custom">
        {{-- Заголовок и кнопка добавления --}}
        <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-700 relative">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Отзывы
            </h1>
            @auth
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Написать отзыв
                </a>
            @endauth
        </div>

        {{-- Сообщение об успехе --}}
        @if(session('success'))
            <div class="alert alert-success fade-in">
                {{ session('success') }}
            </div>
        @endif

        {{-- Список отзывов --}}
        @forelse($reviews as $review)
            <div class="card mb-6 fade-in">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex-1">
                        {{-- Ссылка на статью --}}
                        <a href="{{ route('articles.show', $review->article) }}" class="text-xl font-semibold text-blue-400 hover:text-blue-300 transition">
                            {{ $review->article->title }}
                        </a>
                        {{-- Автор и дата --}}
                        <div class="flex flex-wrap items-center gap-3 mt-2 text-sm text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $review->user->name }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $review->created_at->format('d.m.Y') }}
                            </span>
                        </div>
                        {{-- Фрагмент комментария --}}
                        <p class="mt-3 text-gray-300 line-clamp-2">
                            {{ $review->getExcerpt(120) }}
                        </p>
                    </div>

                    {{-- Рейтинг и действия --}}
                    <div class="flex flex-col items-end gap-3">
                        <div class="flex items-center gap-2">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-sm font-medium text-yellow-400">{{ $review->rating }}/5</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('reviews.show', $review) }}" class="btn btn-primary text-sm py-2 px-4">
                                Читать
                            </a>
                            @can('update', $review)
                                <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning text-sm py-2 px-4">
                                    ✏️
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card text-center py-12">
                <svg class="w-20 h-20 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4z"></path>
                </svg>
                <h3 class="text-2xl font-semibold text-white mb-2">Пока нет отзывов</h3>
                <p class="text-gray-400 mb-6">Будьте первым, кто оставит отзыв!</p>
                @auth
                    <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                        Написать отзыв
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Войти и написать
                    </a>
                @endauth
            </div>
        @endforelse
        
@endsection

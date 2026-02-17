@extends('layouts.app')

@section('title', "Отзыв на статью «{$review->article->title}»")

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="card fade-in">
            {{-- Заголовок – название статьи --}}
            <div class="flex justify-between items-start mb-6">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    {{ $review->article->title }}
                </h1>
                <div class="text-right">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-2xl font-bold text-yellow-400">{{ $review->rating }}</span>
                        <span class="text-gray-400">/ 5</span>
                    </div>
                    <div class="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- Мета-информация: автор и дата --}}
            <div class="mb-6 space-y-2">
                <p class="flex items-center gap-2 text-gray-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium">{{ $review->user->name }}</span>
                </p>
                <p class="flex items-center gap-2 text-gray-400 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $review->created_at->format('d.m.Y H:i') }}
                    @if($review->created_at != $review->updated_at)
                        <span class="text-gray-500">(ред. {{ $review->updated_at->format('d.m.Y H:i') }})</span>
                    @endif
                </p>
            </div>

            {{-- Комментарий --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-white mb-3">Комментарий</h3>
                <div class="p-5 bg-gray-800/50 rounded-xl border-l-4 border-blue-500 whitespace-pre-wrap">
                    {{ $review->comment ?: 'Пользователь не оставил текстовый отзыв.' }}
                </div>
            </div>

            {{-- Кнопки действий --}}
            <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                    ← Назад к списку
                </a>
                <div class="flex gap-3">
                    @can('update', $review)
                        <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning">
                            ✏️ Редактировать
                        </a>
                    @endcan
                    @can('delete', $review)
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить отзыв?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                🗑️ Удалить
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Редактировать отзыв')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="card fade-in relative">
            {{-- Индикатор режима редактирования --}}
            <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-1 rounded-full text-xs font-semibold uppercase tracking-wider shadow-lg">
                Режим редактирования
            </span>

            <h2 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent text-center">
                Редактировать отзыв
            </h2>

            <form action="{{ route('reviews.update', $review) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Выбор статьи --}}
                <div class="mb-5">
                    <label for="article_id" class="form-label">Статья</label>
                    <select name="article_id" id="article_id" class="form-control @error('article_id') border-red-500 @enderror" required>
                        <option value="" disabled>— Выберите статью —</option>
                        @foreach($articles as $article)
                            <option value="{{ $article->id }}" {{ old('article_id', $review->article_id) == $article->id ? 'selected' : '' }}>
                                {{ $article->title }} ({{ $article->author }})
                            </option>
                        @endforeach
                    </select>
                    @error('article_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Рейтинг --}}
                <div class="mb-5">
                    <label for="rating" class="form-label">Оценка</label>
                    <select name="rating" id="rating" class="form-control @error('rating') border-red-500 @enderror" required>
                        <option value="" disabled>— Выберите оценку —</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                                {{ $i }} звезда{{ $i > 1 ? ($i < 5 ? 'ы' : '') : '' }}
                            </option>
                        @endfor
                    </select>
                    @error('rating')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Комментарий --}}
                <div class="mb-6">
                    <label for="comment" class="form-label">Комментарий (необязательно)</label>
                    <textarea name="comment" id="comment" rows="5" class="form-control @error('comment') border-red-500 @enderror" placeholder="Поделитесь впечатлениями...">{{ old('comment', $review->comment) }}</textarea>
                    @error('comment')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Кнопки --}}
                <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
                        ← Отмена
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Сохранить изменения
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

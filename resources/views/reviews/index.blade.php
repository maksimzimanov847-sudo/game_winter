@extends('layouts.app')

@section('title', 'Статьи')

@section('content')

<body class="bg-gray-50">
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

@php
    $reviews = $review ?? null;
@endphp
<body class="bg-gray-50">
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $review->title }}</h1>
            <div class="text-right">
                <span class="text-lg font-bold">{{ $review->rating }}/5</span>
            </div>
        </div>

        <div class="mb-6">
            <p class="text-gray-700 mb-2"><strong>Автор:</strong> {{ $review->author }}</p>
            <p class="text-gray-500 text-sm">{{ $review->created_at->format('d.m.Y H:i') }}</p>
        </div>

        <div class="mb-8">
            <p class="text-gray-700">{{ $review->comment }}</p>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('reviews.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Назад
            </a>
            <div class="flex space-x-2">
                <a href="{{ route('reviews.edit', $review) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                    Редактировать
                </a>
                <form action="{{ route('reviews.destroy', $review) }}"
                      method="POST"
                      onsubmit="return confirm('Вы уверены?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

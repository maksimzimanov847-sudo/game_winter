@php
    $reviews = $review ?? null;
@endphp
<body class="bg-gray-50">
<div class="container mx-auto px-4 py-8 max-w-md">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Редактировать отзыв</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.update', $review) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Заголовок</label>
                <input type="text" name="title" value="{{ old('title', $review->title) }}"
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Автор</label>
                <input type="text" name="author" value="{{ old('author', $review->author) }}"
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Рейтинг (1-5)</label>
                <select name="rating" class="w-full px-3 py-2 border rounded-lg">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                            {{ $i }} звезд
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Комментарий</label>
                <textarea name="comment" rows="4"
                          class="w-full px-3 py-2 border rounded-lg">{{ old('comment', $review->comment) }}</textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('reviews.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                    Назад
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Обновить
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

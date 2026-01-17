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
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Фоновые эффекты */
    body.bg-gray-50::before {
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
    }

    .container.mx-auto.px-4.py-8.max-w-md {
        max-width: 100%;
        width: 100%;
        margin: 0 auto;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    /* Карточка формы */
    .bg-white.rounded-lg.shadow.p-6 {
        background: var(--dark-bg-card) !important;
        border-radius: 16px !important;
        padding: 2.5rem !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
        border: 1px solid var(--dark-border);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 500px;
        animation: fadeInUp 0.5s ease-out forwards;
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

    /* Заголовок */
    .text-2xl.font-bold.mb-6 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark-text) !important;
        margin-bottom: 2rem !important;
        text-align: center;
        background: var(--dark-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--dark-border);
        position: relative;
    }

    .text-2xl.font-bold.mb-6::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: var(--dark-gradient);
        border-radius: 2px;
    }

    /* Ошибки валидации */
    .bg-red-100.border.border-red-400.text-red-700.px-4.py-3.rounded.mb-6 {
        background: rgba(239, 68, 68, 0.15) !important;
        border: 1px solid rgba(239, 68, 68, 0.3) !important;
        color: var(--dark-danger) !important;
        padding: 1rem !important;
        border-radius: 8px !important;
        margin-bottom: 1.5rem !important;
        backdrop-filter: blur(10px);
    }

    .bg-red-100.border.border-red-400.text-red-700.px-4.py-3.rounded.mb-6 ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .bg-red-100.border.border-red-400.text-red-700.px-4.py-3.rounded.mb-6 li {
        padding: 0.25rem 0;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .bg-red-100.border.border-red-400.text-red-700.px-4.py-3.rounded.mb-6 li::before {
        content: '⚠️';
        font-size: 0.9rem;
    }

    /* Форма */
    form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .mb-4, .mb-6 {
        margin-bottom: 0 !important;
    }

    /* Метки полей */
    .block.text-gray-700.mb-2 {
        display: block;
        color: var(--dark-text) !important;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .block.text-gray-700.mb-2::after {
        content: '•';
        color: var(--dark-accent);
        font-size: 1.2rem;
    }

    /* Поля ввода */
    .w-full.px-3.py-2.border.rounded-lg {
        width: 100% !important;
        padding: 0.875rem 1rem !important;
        background: rgba(30, 41, 59, 0.5) !important;
        border: 1px solid var(--dark-border) !important;
        border-radius: 10px !important;
        color: var(--dark-text) !important;
        font-size: 1rem;
        transition: all 0.3s ease;
        outline: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .w-full.px-3.py-2.border.rounded-lg::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    .w-full.px-3.py-2.border.rounded-lg:focus {
        border-color: var(--dark-accent) !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        background: rgba(30, 41, 59, 0.8) !important;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }

    /* Стили для select */
    select.w-full.px-3.py-2.border.rounded-lg {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.25rem;
        padding-right: 2.5rem !important;
        cursor: pointer;
    }

    select.w-full.px-3.py-2.border.rounded-lg option {
        background: var(--dark-bg-card);
        color: var(--dark-text);
        padding: 0.75rem;
    }

    /* Стили для звездных опций в select */
    option[value="1"] { background-image: none; padding-left: 1.5rem; }
    option[value="1"]::before { content: "★"; margin-right: 0.5rem; color: var(--dark-warning); }
    option[value="2"]::before { content: "★★"; margin-right: 0.5rem; color: var(--dark-warning); }
    option[value="3"]::before { content: "★★★"; margin-right: 0.5rem; color: var(--dark-warning); }
    option[value="4"]::before { content: "★★★★"; margin-right: 0.5rem; color: var(--dark-warning); }
    option[value="5"]::before { content: "★★★★★"; margin-right: 0.5rem; color: var(--dark-warning); }

    /* Стили для textarea */
    textarea.w-full.px-3.py-2.border.rounded-lg {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
        line-height: 1.5;
    }

    /* Кнопки */
    .flex.justify-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--dark-border);
    }

    .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg,
    .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg {
        padding: 0.875rem 1.75rem !important;
        border-radius: 10px !important;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        min-width: 120px;
    }

    .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg {
        background: rgba(148, 163, 184, 0.15) !important;
        color: var(--dark-text-secondary) !important;
        border: 1px solid rgba(148, 163, 184, 0.3) !important;
    }

    .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg:hover {
        background: rgba(148, 163, 184, 0.25) !important;
        color: var(--dark-text) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
        text-decoration: none;
    }

    .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg {
        background: var(--dark-gradient) !important;
        color: white !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3) !important;
    }

    .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4) !important;
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%) !important;
    }


    .form-group {
        position: relative;
    }

    .form-group:hover .block.text-gray-700.mb-2 {
        color: var(--dark-accent) !important;
    }

    .form-group:hover .block.text-gray-700.mb-2::after {
        color: var(--dark-success);
    }

    //.*$
    @media (max-width: 768px) {
        .container.mx-auto.px-4.py-8.max-w-md {
            padding: 1rem;
        }

        .bg-white.rounded-lg.shadow.p-6 {
            padding: 2rem 1.5rem !important;
        }

        .text-2xl.font-bold.mb-6 {
            font-size: 1.5rem;
        }

        .flex.justify-between {
            flex-direction: column;
            gap: 1rem;
        }

        .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg,
        .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .bg-white.rounded-lg.shadow.p-6 {
            padding: 1.5rem 1rem !important;
            border-radius: 12px !important;
        }

        .text-2xl.font-bold.mb-6 {
            font-size: 1.3rem;
            padding-bottom: 0.75rem;
        }

        .w-full.px-3.py-2.border.rounded-lg {
            padding: 0.75rem !important;
            font-size: 0.95rem;
        }

        .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg,
        .bg-blue-600.hover\:bg-blue-700.text-white.px-4.py-2.rounded-lg {
            padding: 0.75rem 1.5rem !important;
            font-size: 0.95rem;
        }
    }

    /* Анимация при фокусе */
    @keyframes pulseFocus {
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }

    .w-full.px-3.py-2.border.rounded-lg:focus {
        animation: pulseFocus 1.5s infinite;
    }

    /* Индикатор заполненности полей */
    .w-full.px-3.py-2.border.rounded-lg:not(:placeholder-shown) {
        background: rgba(30, 41, 59, 0.7) !important;
    }

    /* Специальные стили для формы редактирования */
    .edit-indicator {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--dark-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .bg-white.rounded-lg.shadow.p-6 {
        position: relative;
    }

    .bg-white.rounded-lg.shadow.p-6::before {
        content: 'Режим редактирования';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--dark-gradient);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
</style>

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
                       class="w-full px-3 py-2 border rounded-lg"
                       placeholder="Введите заголовок отзыва">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Автор</label>
                <input type="text" name="author" value="{{ old('author', $review->author) }}"
                       class="w-full px-3 py-2 border rounded-lg"
                       placeholder="Введите имя автора">
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
                          class="w-full px-3 py-2 border rounded-lg"
                          placeholder="Введите комментарий...">{{ old('comment', $review->comment) }}</textarea>
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

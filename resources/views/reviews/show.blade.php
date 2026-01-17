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

    .container.mx-auto.px-4.py-8.max-w-2xl {
        max-width: 800px !important;
        margin: 0 auto !important;
        padding: 2rem 1rem !important;
    }

    /* Карточка отзыва */
    .bg-white.rounded-lg.shadow.p-6 {
        background: var(--dark-bg-card) !important;
        border-radius: 16px !important;
        padding: 2.5rem !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
        border: 1px solid var(--dark-border);
        backdrop-filter: blur(10px);
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

    /* Заголовок и рейтинг */
    .flex.justify-between.items-start.mb-6 {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem !important;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--dark-border);
        position: relative;
    }

    .flex.justify-between.items-start.mb-6::after {
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
        font-size: 2.5rem !important;
        font-weight: 700 !important;
        color: var(--dark-text) !important;
        margin: 0 !important;
        line-height: 1.2;
        background: var(--dark-gradient);
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
        flex: 1;
    }

    .text-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.5rem;
    }

    .text-lg.font-bold {
        font-size: 1.75rem !important;
        font-weight: 700 !important;
        color: var(--dark-warning) !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .text-lg.font-bold::before {
        content: '⭐';
        font-size: 1.5rem;
    }

    /* Мета-информация */
    .mb-6 {
        margin-bottom: 1.5rem !important;
    }

    .text-gray-700.mb-2 {
        color: var(--dark-text) !important;
        font-size: 1.1rem !important;
        margin-bottom: 0.5rem !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .text-gray-700.mb-2 strong {
        color: var(--dark-text-secondary);
        font-weight: 600;
        min-width: 70px;
    }

    .text-gray-500.text-sm {
        color: var(--dark-text-secondary) !important;
        font-size: 0.95rem !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        background: rgba(30, 41, 59, 0.5);
        border-radius: 8px;
        border: 1px solid var(--dark-border);
    }

    .text-gray-500.text-sm::before {
        content: '📅';
        font-size: 1rem;
    }

    /* Комментарий */
    .mb-8 {
        margin-bottom: 2rem !important;
    }

    .text-gray-700 {
        color: var(--dark-text-secondary) !important;
        font-size: 1.1rem !important;
        line-height: 1.7;
        padding: 1.5rem;
        background: rgba(30, 41, 59, 0.3);
        border-radius: 12px;
        border-left: 4px solid var(--dark-accent);
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    /* Кнопки */
    .flex.justify-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--dark-border);
        flex-wrap: wrap;
    }

    /* Кнопка "Назад" */
    .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg {
        padding: 0.875rem 1.75rem !important;
        border-radius: 10px !important;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        min-width: 120px;
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

    .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg::before {
        content: '←';
        font-size: 1.2rem;
    }

    /* Контейнер для кнопок редактирования и удаления */
    .flex.space-x-2 {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    /* Кнопка редактирования */
    .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg {
        padding: 0.875rem 1.75rem !important;
        border-radius: 10px !important;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        min-width: 140px;
        background: rgba(245, 158, 11, 0.15) !important;
        color: var(--dark-warning) !important;
        border: 1px solid rgba(245, 158, 11, 0.3) !important;
    }

    .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg:hover {
        background: rgba(245, 158, 11, 0.25) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
        text-decoration: none;
    }

    .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg::before {
        content: '✏️';
        font-size: 1.2rem;
    }

    /* Кнопка удаления */
    .bg-red-600.hover\:bg-red-700.text-white.px-4.py-2.rounded-lg {
        padding: 0.875rem 1.75rem !important;
        border-radius: 10px !important;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        min-width: 140px;
        background: rgba(239, 68, 68, 0.15) !important;
        color: var(--dark-danger) !important;
        border: 1px solid rgba(239, 68, 68, 0.3) !important;
    }

    .bg-red-600.hover\:bg-red-700.text-white.px-4.py-2.rounded-lg:hover {
        background: rgba(239, 68, 68, 0.25) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        text-decoration: none;
    }

    .bg-red-600.hover\:bg-red-700.text-white.px-4.py-2.rounded-lg::before {
        content: '🗑️';
        font-size: 1.2rem;
    }

    /* Форма удаления */
    form {
        margin: 0;
        display: inline;
    }

    /* Индикатор звездного рейтинга */
    .star-rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-top: 0.25rem;
    }

    .star {
        font-size: 1.25rem;
        color: var(--dark-border);
    }

    .star.filled {
        color: var(--dark-warning);
    }

    /* Бейдж для рейтинга */
    .rating-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(245, 158, 11, 0.15);
        border-radius: 25px;
        border: 1px solid rgba(245, 158, 11, 0.3);
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--dark-warning);
    }


    @media (max-width: 768px) {
        .container.mx-auto.px-4.py-8.max-w-2xl {
            padding: 1rem !important;
        }

        .bg-white.rounded-lg.shadow.p-6 {
            padding: 1.5rem !important;
        }

        .flex.justify-between.items-start.mb-6 {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .text-3xl.font-bold.text-gray-800 {
            font-size: 2rem !important;
        }

        .text-right {
            align-items: flex-start;
        }

        .flex.justify-between {
            flex-direction: column;
            gap: 1rem;
        }

        .flex.space-x-2 {
            width: 100%;
            justify-content: flex-start;
        }

        .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg,
        .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg,
        .bg-red-600.hover\:bg-red-700.text-white.px-4.py-2.rounded-lg {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .text-3xl.font-bold.text-gray-800 {
            font-size: 1.5rem !important;
        }

        .text-lg.font-bold {
            font-size: 1.5rem !important;
        }

        .bg-white.rounded-lg.shadow.p-6 {
            padding: 1.25rem !important;
            border-radius: 12px !important;
        }

        .text-gray-700 {
            padding: 1rem;
            font-size: 1rem !important;
        }

        .bg-gray-300.hover\:bg-gray-400.text-gray-800.px-4.py-2.rounded-lg,
        .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg,
        .bg-red-600.hover\:bg-red-700.text-white.px-4.py-2.rounded-lg {
            padding: 0.75rem 1.5rem !important;
            font-size: 0.95rem !important;
            min-width: auto;
        }
    }


    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .bg-yellow-500.hover\:bg-yellow-600.text-white.px-4.py-2.rounded-lg:hover {
        animation: pulse 0.5s ease;
    }

    /* Стили для подтверждения удаления */
    form[onsubmit] button {
        transition: all 0.3s ease;
    }

    form[onsubmit] button:hover {
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    /* Эффект для всей карточки при наведении */
    .bg-white.rounded-lg.shadow.p-6:hover {
        border-color: var(--dark-accent);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5) !important;
    }

    /* Стили для длинных комментариев */
    .text-gray-700 {
        max-height: 400px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: var(--dark-border) transparent;
    }

    .text-gray-700::-webkit-scrollbar {
        width: 6px;
    }

    .text-gray-700::-webkit-scrollbar-track {
        background: transparent;
    }

    .text-gray-700::-webkit-scrollbar-thumb {
        background: var(--dark-border);
        border-radius: 3px;
    }

    .text-gray-700::-webkit-scrollbar-thumb:hover {
        background: var(--dark-accent);
    }
</style>

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
                <div class="star-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">⭐</span>
                    @endfor
                </div>
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

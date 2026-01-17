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

    /* Общие стили для страницы */
    .x-app-layout {
        background: var(--dark-bg) !important;
        min-height: 100vh;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        color: var(--dark-text);
    }

    /* Шапка */
    [x-slot="header"] {
        background: linear-gradient(135deg, var(--dark-bg-lighter) 0%, var(--dark-bg-card) 100%) !important;
        border-bottom: 1px solid var(--dark-border) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2) !important;
        padding: 1.5rem 0 !important;
    }

    .font-semibold.text-xl.text-gray-800.leading-tight {
        font-size: 1.5rem !important;
        font-weight: 700 !important;
        color: var(--dark-text) !important;
        margin: 0 !important;
        padding: 0 2rem !important;
        background: var(--dark-gradient);
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        letter-spacing: -0.5px;
    }

    /* Основной контейнер */
    .py-12 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }

    .max-w-7xl.mx-auto {
        max-width: 1200px !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .sm\:px-6 {
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }

    .lg\:px-8 {
        padding-left: 2rem !important;
        padding-right: 2rem !important;
    }

    .space-y-6 > * + * {
        margin-top: 1.5rem !important;
    }

    /* Контейнеры для форм */
    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg {
        background: var(--dark-bg-card) !important;
        padding: 2rem !important;
        border-radius: 16px !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
        border: 1px solid var(--dark-border);
        backdrop-filter: blur(10px);
        animation: fadeInUp 0.5s ease-out forwards;
        margin-bottom: 1.5rem;
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

    /* Контейнер с максимальной шириной */
    .max-w-xl {
        max-width: 500px !important;
        margin: 0 auto !important;
    }

    /* Стили для форм (уже были созданы ранее, но для полноты добавим основные) */
    form {
        color: var(--dark-text);
    }

    input, select, textarea {
        background: rgba(30, 41, 59, 0.5) !important;
        border: 1px solid var(--dark-border) !important;
        color: var(--dark-text) !important;
    }

    button, .button {
        background: var(--dark-gradient) !important;
        color: white !important;
    }

    /* Стили для заголовков внутри форм (если есть) */
    h2, h3, .form-title {
        color: var(--dark-text) !important;
    }

    /* Анимация для последовательного появления карточек */
    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg:nth-child(1) {
        animation-delay: 0.1s;
    }

    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg:nth-child(2) {
        animation-delay: 0.2s;
    }

    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Эффект при наведении на карточки */
    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg {
        transition: all 0.3s ease;
    }

    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg:hover {
        transform: translateY(-5px);
        border-color: var(--dark-accent);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5) !important;
    }

    /* Стили для модальных окон (если есть в формах) */
    .modal, [x-modal] {
        background: rgba(15, 23, 42, 0.95) !important;
        backdrop-filter: blur(10px);
    }

    //.*$
    @media (max-width: 768px) {
        .py-12 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }

        .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg {
            padding: 1.5rem !important;
            border-radius: 12px !important;
        }

        .font-semibold.text-xl.text-gray-800.leading-tight {
            font-size: 1.25rem !important;
            padding: 0 1rem !important;
        }

        .sm\:px-6 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }

    @media (max-width: 480px) {
        .py-12 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg {
            padding: 1.25rem !important;
        }

        .font-semibold.text-xl.text-gray-800.leading-tight {
            font-size: 1.1rem !important;
        }

        .lg\:px-8 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }

    /* Стили для фона страницы с градиентом */
    .x-app-layout::before {
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

    /* Стили для разделителей между секциями */
    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg + .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg {
        border-top: 1px solid rgba(148, 163, 184, 0.1);
        padding-top: 2.5rem !important;
    }

    /* Стили для текста внутри форм */
    .text-gray-600, .text-gray-800 {
        color: var(--dark-text-secondary) !important;
    }

    /* Стили для кнопок внутри форм (если не применяются автоматически) */
    .bg-blue-600, .bg-red-600, .bg-green-600 {
        background: var(--dark-gradient) !important;
    }

    .bg-blue-600:hover, .bg-red-600:hover, .bg-green-600:hover {
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%) !important;
    }

    /* Стили для сообщений об ошибках и успехе */
    .text-red-600 {
        color: var(--dark-danger) !important;
    }

    .text-green-600 {
        color: var(--dark-success) !important;
    }

    /* Улучшенные тени для глубины */
    .shadow {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
    }

    .sm\:rounded-lg {
        border-radius: 12px !important;
    }

    /* Стили для контейнера с формами при фокусе */
    .p-4.sm\:p-8.bg-white.shadow.sm\:rounded-lg:focus-within {
        border-color: var(--dark-accent);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Информация профиля') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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

    /* Стили для секции */
    section {
        background: var(--dark-bg-card);
        padding: 2rem;
        border-radius: 12px;
        border: 1px solid var(--dark-border);
        box-shadow: 0 8px 32px var(--dark-shadow);
        margin: 1.5rem 0;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Заголовок секции */
    header {
        margin-bottom: 1.5rem;
    }

    .text-lg.font-medium.text-gray-900 {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: var(--dark-text) !important;
        margin: 0 0 0.75rem 0 !important;
        background: var(--dark-gradient);
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .text-lg.font-medium.text-gray-900::before {
        content: '👤';
        font-size: 1.2rem;
    }

    .mt-1.text-sm.text-gray-600 {
        margin-top: 0.5rem !important;
        font-size: 0.95rem !important;
        color: var(--dark-text-secondary) !important;
        line-height: 1.5;
        padding: 0.75rem;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 8px;
        border-left: 3px solid var(--dark-accent);
    }

    /* Формы */
    form#send-verification {
        display: none; /* Скрытая форма */
    }

    form.mt-6.space-y-6 {
        margin-top: 1.5rem !important;
    }

    .mt-6.space-y-6 > div {
        margin-bottom: 1.5rem !important;
    }

    /* Метки полей */
    x-input-label, [x-input-label], .x-input-label,
    label[for="name"], label[for="email"] {
        display: block;
        color: var(--dark-text) !important;
        font-weight: 600 !important;
        font-size: 0.95rem !important;
        margin-bottom: 0.5rem !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    x-input-label::before, [x-input-label]::before, .x-input-label::before,
    label[for="name"]::before, label[for="email"]::before {
        content: '→';
        color: var(--dark-accent);
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* Поля ввода */
    x-text-input, [x-text-input], .x-text-input,
    input#name, input#email {
        width: 100% !important;
        padding: 0.875rem 1rem !important;
        background: rgba(30, 41, 59, 0.5) !important;
        border: 1px solid var(--dark-border) !important;
        border-radius: 10px !important;
        color: var(--dark-text) !important;
        font-size: 1rem !important;
        transition: all 0.3s ease;
        outline: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 0.5rem !important;
    }

    x-text-input::placeholder, [x-text-input]::placeholder, .x-text-input::placeholder,
    input#name::placeholder, input#email::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    x-text-input:focus, [x-text-input]:focus, .x-text-input:focus,
    input#name:focus, input#email:focus {
        border-color: var(--dark-accent) !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        background: rgba(30, 41, 59, 0.8) !important;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }

    /* Сообщения об ошибках */
    x-input-error, [x-input-error], .x-input-error,
    .mt-2.text-sm.text-red-600 {
        color: var(--dark-danger) !important;
        font-size: 0.9rem !important;
        margin-top: 0.5rem !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    x-input-error::before, [x-input-error]::before, .x-input-error::before,
    .mt-2.text-sm.text-red-600::before {
        content: '⚠️';
        font-size: 0.9rem;
    }

    /* Секция верификации email */
    .text-sm.mt-2.text-gray-800 {
        color: var(--dark-warning) !important;
        font-size: 0.95rem !important;
        margin-top: 1rem !important;
        padding: 1rem;
        background: rgba(245, 158, 11, 0.1);
        border-radius: 8px;
        border-left: 3px solid var(--dark-warning);
    }

    .underline.text-sm.text-gray-600.hover\:text-gray-900.rounded-md {
        color: var(--dark-warning) !important;
        text-decoration: none !important;
        padding: 0.5rem 1rem;
        background: rgba(245, 158, 11, 0.15);
        border: 1px solid rgba(245, 158, 11, 0.3);
        border-radius: 8px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.75rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .underline.text-sm.text-gray-600.hover\:text-gray-900.rounded-md:hover {
        color: white !important;
        background: rgba(245, 158, 11, 0.25);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        text-decoration: none !important;
    }

    .underline.text-sm.text-gray-600.hover\:text-gray-900.rounded-md::before {
        content: '✉️';
        font-size: 1rem;
    }

    /* Сообщение об отправке ссылки верификации */
    .mt-2.font-medium.text-sm.text-green-600 {
        color: var(--dark-success) !important;
        font-size: 0.95rem !important;
        margin-top: 1rem !important;
        padding: 0.75rem 1rem;
        background: rgba(16, 185, 129, 0.15);
        border-radius: 8px;
        border: 1px solid rgba(16, 185, 129, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mt-2.font-medium.text-sm.text-green-600::before {
        content: '✓';
        font-size: 1rem;
        font-weight: bold;
    }

    /* Кнопка сохранения */
    .flex.items-center.gap-4 {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1.5rem !important;
        padding-top: 1.5rem;
        border-top: 1px solid var(--dark-border);
    }

    x-primary-button, [x-primary-button], .x-primary-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.875rem 1.75rem !important;
        background: var(--dark-gradient) !important;
        color: white !important;
        border: none !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        font-size: 1rem !important;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3) !important;
    }

    x-primary-button:hover, [x-primary-button]:hover, .x-primary-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4) !important;
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%) !important;
    }

    /* Сообщение об успешном сохранении */
    .text-sm.text-gray-600[x-data] {
        color: var(--dark-success) !important;
        font-size: 0.95rem !important;
        padding: 0.5rem 1rem;
        background: rgba(16, 185, 129, 0.15);
        border-radius: 8px;
        border: 1px solid rgba(16, 185, 129, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-left: 1rem;
    }

    .text-sm.text-gray-600[x-data]::before {
        content: '✓';
        font-size: 1rem;
        font-weight: bold;
    }

    /* Анимация для статусного сообщения */
    [x-transition] {
        transition: all 0.3s ease;
    }

    /* Иконка для верификации */
    .text-sm.mt-2.text-gray-800::before {
        content: '⚠️';
        margin-right: 0.5rem;
        font-size: 1rem;
    }

    //.*$
    @media (max-width: 768px) {
        section {
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .flex.items-center.gap-4 {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        x-primary-button, [x-primary-button], .x-primary-button {
            width: 100%;
            justify-content: center;
        }

        .text-sm.text-gray-600[x-data] {
            margin-left: 0;
            margin-top: 0.75rem;
            align-self: flex-start;
        }

        .underline.text-sm.text-gray-600.hover\:text-gray-900.rounded-md {
            width: 100%;
            justify-content: center;
            margin-top: 1rem;
        }
    }

    @media (max-width: 480px) {
        section {
            padding: 1.25rem;
        }

        .text-lg.font-medium.text-gray-900 {
            font-size: 1.1rem !important;
        }

        .mt-1.text-sm.text-gray-600 {
            font-size: 0.9rem !important;
            padding: 0.5rem;
        }

        x-text-input, [x-text-input], .x-text-input,
        input#name, input#email {
            padding: 0.75rem !important;
            font-size: 0.95rem !important;
        }

        x-primary-button, [x-primary-button], .x-primary-button {
            padding: 0.75rem 1.5rem !important;
            font-size: 0.95rem !important;
        }

        .text-sm.mt-2.text-gray-800 {
            font-size: 0.9rem !important;
            padding: 0.75rem;
        }
    }

    /* Дополнительные эффекты для полей */
    input#name:valid, input#email:valid {
        border-color: rgba(16, 185, 129, 0.3);
        background: rgba(16, 185, 129, 0.05);
    }

    input#name:invalid:not(:placeholder-shown),
    input#email:invalid:not(:placeholder-shown) {
        border-color: rgba(239, 68, 68, 0.3);
        background: rgba(239, 68, 68, 0.05);
    }

    /* Стили для фона страницы */
    body {
        background: var(--dark-bg);
        color: var(--dark-text);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }

    /* Анимация для кнопки сохранения */
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    x-primary-button:hover, [x-primary-button]:hover, .x-primary-button:hover {
        animation: bounce 0.5s ease;
    }

    /* Иконки внутри полей ввода */
    .input-with-icon {
        position: relative;
    }

    .input-with-icon input {
        padding-left: 2.5rem !important;
    }

    .input-with-icon::before {
        content: '👤';
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--dark-text-secondary);
        z-index: 1;
    }

    #email.input-with-icon::before {
        content: '✉️';
    }

    /* Подсказки при фокусе */
    input:focus + .input-hint {
        opacity: 1;
        transform: translateY(0);
    }

    .input-hint {
        font-size: 0.85rem;
        color: var(--dark-text-secondary);
        margin-top: 0.25rem;
        opacity: 0;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .input-hint::before {
        content: '💡';
        font-size: 0.9rem;
    }
</style>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Информация профиля') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Обновите данные профиля и адрес электронной почты своей учетной записи.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('почта')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Ваш адрес электронной почты не подтвержден.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Нажмите здесь, чтобы отправить письмо с подтверждением еще раз.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('На ваш адрес электронной почты отправлена новая ссылка для подтверждения.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Сохранить.') }}</p>
            @endif
        </div>
    </form>
</section>

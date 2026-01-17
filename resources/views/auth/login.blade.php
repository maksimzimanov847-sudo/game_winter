<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('почта')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <!-- Submit Button & Register Link -->
        <div class="flex items-center justify-between mt-8">
            @if (Route::has('register'))
                <a class="text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-150 ease-in-out" href="{{ route('register') }}">
                    {{ __('Нет аккаунта? Зарегистрироваться') }}
                </a>
            @endif
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Забыли пароль?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Войти') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
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
        --dark-danger-hover: #dc2626;
        --dark-warning: #f59e0b;
        --dark-success: #10b981;
        --dark-shadow: rgba(0, 0, 0, 0.3);
        --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Общие стили страницы */
    body {
        background: var(--dark-bg) !important;
        color: var(--dark-text) !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif !important;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Контейнер формы входа */
    .x-guest-layout {
        background: var(--dark-bg) !important;
        min-height: 100vh;
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Форма входа */
    form[method="POST"][action*="login"] {
        background: var(--dark-bg-card) !important;
        padding: 2.5rem !important;
        border-radius: 16px !important;
        border: 1px solid var(--dark-border) !important;
        box-shadow: 0 20px 40px var(--dark-shadow) !important;
        width: 100%;
        max-width: 450px;
        animation: fadeIn 0.6s ease-out;
        margin: 0 auto;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Заголовки полей */
    x-input-label, .x-input-label {
        display: block !important;
        font-size: 0.95rem !important;
        font-weight: 600 !important;
        color: var(--dark-text) !important;
        margin-bottom: 0.5rem !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Поля ввода */
    x-text-input, .x-text-input,
    #email, #password {
        width: 100% !important;
        padding: 1rem !important;
        background: rgba(30, 41, 59, 0.7) !important;
        border: 1px solid var(--dark-border) !important;
        border-radius: 10px !important;
        color: var(--dark-text) !important;
        font-size: 1rem !important;
        transition: all 0.3s ease;
        outline: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    #email::placeholder, #password::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    #email:focus, #password:focus {
        border-color: var(--dark-accent) !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        background: rgba(30, 41, 59, 0.9) !important;
        transform: translateY(-1px);
    }

    /* Чекбокс "Remember me" */
    #remember_me {
        width: 1.25rem !important;
        height: 1.25rem !important;
        border-color: var(--dark-border) !important;
        background-color: var(--dark-bg-lighter) !important;
        cursor: pointer;
        transition: all 0.3s ease;
        appearance: none;
        -webkit-appearance: none;
        border-radius: 4px;
        position: relative;
    }

    #remember_me:checked {
        background-color: var(--dark-accent) !important;
        border-color: var(--dark-accent) !important;
    }

    #remember_me:checked::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 0.875rem;
        font-weight: bold;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #remember_me:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3) !important;
    }

    label.inline-flex.items-center {
        cursor: pointer;
        user-select: none;
    }

    span.ms-2.text-sm.text-gray-600 {
        color: var(--dark-text-secondary) !important;
        font-size: 0.95rem !important;
        transition: color 0.3s ease;
    }

    label.inline-flex.items-center:hover span.ms-2.text-sm.text-gray-600 {
        color: var(--dark-text) !important;
    }

    /* Ссылка "Forgot your password?" */
    a.underline.text-sm.text-gray-600 {
        color: var(--dark-text-secondary) !important;
        text-decoration: none !important;
        padding: 0.5rem 0.75rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: 500;
        display: inline-block;
    }

    a.underline.text-sm.text-gray-600:hover {
        color: var(--dark-accent) !important;
        background: rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    /* Кнопка "Log in" */
    x-primary-button, .x-primary-button {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 0.75rem;
        padding: 1rem 2rem !important;
        background: var(--dark-gradient) !important;
        color: white !important;
        border: none !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        font-size: 1rem !important;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        min-width: 120px;
        text-decoration: none !important;
    }

    x-primary-button:hover, .x-primary-button:hover {
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    x-primary-button:active, .x-primary-button:active {
        transform: translateY(0);
    }

    /* Сообщения об ошибках */
    x-input-error, .x-input-error {
        color: var(--dark-danger) !important;
        font-size: 0.9rem !important;
        margin-top: 0.5rem !important;
        padding: 0.75rem;
        background: rgba(239, 68, 68, 0.1);
        border-radius: 8px;
        border-left: 3px solid var(--dark-danger);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    x-input-error::before {
        content: '⚠️';
        font-size: 0.9rem;
    }

    /* Session Status */
    x-auth-session-status, .x-auth-session-status {
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid var(--dark-success);
        color: var(--dark-success);
        font-weight: 500;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    //.*$
    @media (max-width: 768px) {
        .x-guest-layout {
            padding: 1rem;
        }

        form[method="POST"][action*="login"] {
            padding: 1.75rem !important;
            margin: 1rem;
        }

        .flex.items-center.justify-end {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch !important;
        }

        a.underline.text-sm.text-gray-600 {
            order: 2;
            text-align: center;
            padding: 0.75rem;
        }

        x-primary-button, .x-primary-button {
            order: 1;
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        form[method="POST"][action*="login"] {
            padding: 1.5rem !important;
        }

        #email, #password {
            padding: 0.875rem !important;
        }

        x-primary-button, .x-primary-button {
            padding: 0.875rem 1.5rem !important;
        }
    }

    /* Анимация при фокусе на форме */
    form[method="POST"][action*="login"]:focus-within {
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4) !important;
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    /* Утилитарные классы */
    .block {
        display: block !important;
    }

    .mt-1 {
        margin-top: 0.25rem !important;
    }

    .mt-2 {
        margin-top: 0.5rem !important;
    }

    .mt-4 {
        margin-top: 1rem !important;
    }

    .mb-4 {
        margin-bottom: 1rem !important;
    }

    .ms-2 {
        margin-left: 0.5rem !important;
    }

    .ms-3 {
        margin-left: 0.75rem !important;
    }

    .w-full {
        width: 100% !important;
    }

    /* Дополнительные улучшения */
    .flex.items-center.justify-end {
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        margin-top: 1.5rem !important;
    }

    /* Эффект для всей формы при загрузке */
    @keyframes glow {
        0%, 100% {
            box-shadow: 0 20px 40px var(--dark-shadow);
        }
        50% {
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }
    }

    form[method="POST"][action*="login"] {
        animation: fadeIn 0.6s ease-out, glow 3s ease-in-out 0.6s;
    }
</style>

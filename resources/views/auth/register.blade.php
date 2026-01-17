<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('почта')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-150 ease-in-out" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Регистрация') }}
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

    /* Контейнер формы регистрации */
    .x-guest-layout {
        background: var(--dark-bg) !important;
        min-height: 100vh;
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Форма регистрации */
    form[method="POST"][action*="register"] {
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
    #name, #email, #password, #password_confirmation {
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

    #name::placeholder, #email::placeholder,
    #password::placeholder, #password_confirmation::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    #name:focus, #email:focus,
    #password:focus, #password_confirmation:focus {
        border-color: var(--dark-accent) !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        background: rgba(30, 41, 59, 0.9) !important;
        transform: translateY(-1px);
    }

    /* Ссылка "Already registered?" */
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

    /* Кнопка "Register" */
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

    /* Анимация для полей формы */
    form[method="POST"][action*="register"] div {
        animation: slideUp 0.5s ease-out;
        animation-fill-mode: both;
    }

    form[method="POST"][action*="register"] div:nth-child(1) {
        animation-delay: 0.1s;
    }

    form[method="POST"][action*="register"] div:nth-child(2) {
        animation-delay: 0.2s;
    }

    form[method="POST"][action*="register"] div:nth-child(3) {
        animation-delay: 0.3s;
    }

    form[method="POST"][action*="register"] div:nth-child(4) {
        animation-delay: 0.4s;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    //.*$
    @media (max-width: 768px) {
        .x-guest-layout {
            padding: 1rem;
        }

        form[method="POST"][action*="register"] {
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
        form[method="POST"][action*="register"] {
            padding: 1.5rem !important;
        }

        #name, #email, #password, #password_confirmation {
            padding: 0.875rem !important;
        }

        x-primary-button, .x-primary-button {
            padding: 0.875rem 1.5rem !important;
        }
    }

    /* Анимация при фокусе на форме */
    form[method="POST"][action*="register"]:focus-within {
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

    .ms-4 {
        margin-left: 1rem !important;
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

    form[method="POST"][action*="register"] {
        animation: fadeIn 0.6s ease-out, glow 3s ease-in-out 0.6s;
    }

    /* Специфичные стили для поля подтверждения пароля */
    #password_confirmation {
        margin-top: 0.5rem !important;
    }

    /* Подсветка паролей при совпадении */
    #password:valid + #password_confirmation:valid {
        border-color: var(--dark-success) !important;
    }

    #password:invalid + #password_confirmation:invalid {
        border-color: var(--dark-danger) !important;
    }

    /* Иконки для полей */
    #name {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'%3E%3C/path%3E%3Ccircle cx='12' cy='7' r='4'%3E%3C/circle%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3rem !important;
    }

    #email {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z'%3E%3C/path%3E%3Cpolyline points='22,6 12,13 2,6'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3rem !important;
    }

    #password {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='11' width='18' height='11' rx='2' ry='2'%3E%3C/rect%3E%3Cpath d='M7 11V7a5 5 0 0 1 10 0v4'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3rem !important;
    }

    #password_confirmation {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M22 11.08V12a10 10 0 1 1-5.93-9.14'%3E%3C/path%3E%3Cpolyline points='22 4 12 14.01 9 11.01'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3rem !important;
    }
</style>

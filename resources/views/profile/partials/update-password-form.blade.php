
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Обновить пароль') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Чтобы обеспечить безопасность аккаунта, используйте длинный случайный пароль.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div>
                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

                @if (session('status') === 'password-updated')
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
        --dark-success-hover: #059669;
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
        content: '🔒';
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

    /* Форма */
    form.mt-6.space-y-6 {
        margin-top: 1.5rem !important;
    }

    .mt-6.space-y-6 > div {
        margin-bottom: 1.5rem !important;
    }

    /* Метки полей */
    x-input-label, [x-input-label], .x-input-label,
    label[for^="update_password_"] {
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
    label[for^="update_password_"]::before {
        content: '→';
        color: var(--dark-accent);
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* Поля ввода */
    x-text-input, [x-text-input], .x-text-input,
    input#update_password_current_password,
    input#update_password_password,
    input#update_password_password_confirmation {
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
    input#update_password_current_password::placeholder,
    input#update_password_password::placeholder,
    input#update_password_password_confirmation::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    x-text-input:focus, [x-text-input]:focus, .x-text-input:focus,
    input#update_password_current_password:focus,
    input#update_password_password:focus,
    input#update_password_password_confirmation:focus {
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

    /* Дополнительные стили для индикаторов надежности пароля */
    .password-strength {
        margin-top: 0.5rem;
    }

    .strength-bar {
        height: 4px;
        background: var(--dark-border);
        border-radius: 2px;
        overflow: hidden;
        margin-top: 0.25rem;
    }

    .strength-fill {
        height: 100%;
        width: 0;
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .strength-weak {
        background: var(--dark-danger);
    }

    .strength-medium {
        background: var(--dark-warning);
    }

    .strength-strong {
        background: var(--dark-success);
    }

    .strength-label {
        font-size: 0.85rem;
        color: var(--dark-text-secondary);
        margin-top: 0.25rem;
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
        input#update_password_current_password,
        input#update_password_password,
        input#update_password_password_confirmation {
            padding: 0.75rem !important;
            font-size: 0.95rem !important;
        }

        x-primary-button, [x-primary-button], .x-primary-button {
            padding: 0.75rem 1.5rem !important;
            font-size: 0.95rem !important;
        }
    }

    /* Иконки для полей пароля */
    input[type="password"] {
        letter-spacing: 2px;
        font-family: 'SF Mono', 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    }

    /* Эффект при вводе в поле пароля */
    input#update_password_password:not(:placeholder-shown) {
        background: rgba(30, 41, 59, 0.7) !important;
    }

    /* Подсказка для сложности пароля */
    .password-hint {
        font-size: 0.85rem;
        color: var(--dark-text-secondary);
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .password-hint::before {
        content: '💡';
        font-size: 0.9rem;
    }

    /* Стили для фона страницы */
    body {
        background: var(--dark-bg);
        color: var(--dark-text);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }

    /* Анимация для кнопки */
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    x-primary-button:hover, [x-primary-button]:hover, .x-primary-button:hover {
        animation: bounce 0.5s ease;
    }
</style>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Удалить учетную запись') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Как только ваша учетная запись будет удалена, все ее ресурсы и данные будут удалены безвозвратно. Перед удалением вашей учетной записи, пожалуйста, загрузите любые данные или информацию, которые вы хотите сохранить.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Удалить учетную запись') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Вы уверены, что хотите удалить свою учетную запись?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
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
        --dark-danger-hover: #dc2626;
        --dark-warning: #f59e0b;
        --dark-success: #10b981;
        --dark-shadow: rgba(0, 0, 0, 0.3);
        --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Переопределение стандартных стилей Laravel */
    section.space-y-6 {
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
        content: '⚠️';
        font-size: 1.2rem;
    }

    .mt-1.text-sm.text-gray-600 {
        margin-top: 0.5rem !important;
        font-size: 0.95rem !important;
        color: var(--dark-text-secondary) !important;
        line-height: 1.5;
        padding: 0.75rem;
        background: rgba(239, 68, 68, 0.1);
        border-radius: 8px;
        border-left: 3px solid var(--dark-danger);
    }

    /* Кнопка открытия модального окна */
    [x-data] {
        width: 100%;
    }

    x-danger-button, [x-danger-button], .x-danger-button {
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem 2rem !important;
        background: rgba(239, 68, 68, 0.15) !important;
        color: var(--dark-danger) !important;
        border: 1px solid rgba(239, 68, 68, 0.3) !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        font-size: 1rem !important;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 1rem;
    }

    x-danger-button:hover, [x-danger-button]:hover, .x-danger-button:hover {
        background: rgba(239, 68, 68, 0.25) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
    }

    /* Модальное окно */
    [x-modal], .x-modal {
        background: rgba(15, 23, 42, 0.95) !important;
        backdrop-filter: blur(10px);
    }

    [x-modal] > div, .x-modal > div {
        background: var(--dark-bg-card) !important;
        border-radius: 16px !important;
        border: 1px solid var(--dark-border) !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
        max-width: 500px !important;
        margin: 2rem auto !important;
    }

    [x-modal] .p-6, .x-modal .p-6 {
        padding: 2rem !important;
    }

    [x-modal] h2, .x-modal h2 {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: var(--dark-text) !important;
        margin: 0 0 1rem 0 !important;
    }

    [x-modal] .text-sm.text-gray-600, .x-modal .text-sm.text-gray-600 {
        color: var(--dark-text-secondary) !important;
        font-size: 0.95rem !important;
        line-height: 1.5;
        margin-top: 0.5rem !important;
    }

    /* Поле ввода пароля */
    .mt-6 {
        margin-top: 1.5rem !important;
    }

    .sr-only {
        position: absolute !important;
        width: 1px !important;
        height: 1px !important;
        padding: 0 !important;
        margin: -1px !important;
        overflow: hidden !important;
        clip: rect(0, 0, 0, 0) !important;
        white-space: nowrap !important;
        border: 0 !important;
    }

    x-text-input, [x-text-input], .x-text-input,
    input#password, input[name="password"] {
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
    }

    input#password::placeholder, input[name="password"]::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    input#password:focus, input[name="password"]:focus {
        border-color: var(--dark-danger) !important;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        background: rgba(30, 41, 59, 0.8) !important;
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

    /* Кнопки в модальном окне */
    .flex.justify-end {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem !important;
    }

    x-secondary-button, [x-secondary-button], .x-secondary-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.875rem 1.75rem !important;
        background: rgba(148, 163, 184, 0.15) !important;
        color: var(--dark-text-secondary) !important;
        border: 1px solid rgba(148, 163, 184, 0.3) !important;
        border-radius: 10px !important;
        font-weight: 500 !important;
        font-size: 1rem !important;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    x-secondary-button:hover, [x-secondary-button]:hover, .x-secondary-button:hover {
        background: rgba(148, 163, 184, 0.25) !important;
        color: var(--dark-text) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
    }

    .ms-3 {
        margin-left: 1rem !important;
    }

    x-danger-button[x-on\\:click], [x-danger-button][x-on\\:click], .x-danger-button[x-on\\:click],
    x-danger-button.ms-3, [x-danger-button].ms-3, .x-danger-button.ms-3 {
        background: var(--dark-gradient) !important;
        color: white !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3) !important;
    }

    x-danger-button[x-on\\:click]:hover, [x-danger-button][x-on\\:click]:hover, .x-danger-button[x-on\\:click]:hover,
                                                                                                              x-danger-button.ms-3:hover, [x-danger-button].ms-3:hover, .x-danger-button.ms-3:hover {
                                                                                                                  background: linear-gradient(135deg, var(--dark-danger) 0%, #764ba2 100%) !important;
                                                                                                                  transform: translateY(-2px);
                                                                                                                  box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4) !important;
                                                                                                              }

    //.*$
    @media (max-width: 768px) {
        section.space-y-6 {
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .flex.justify-end {
            flex-direction: column;
            gap: 0.75rem;
        }

        x-secondary-button, x-danger-button,
        [x-secondary-button], [x-danger-button],
        .x-secondary-button, .x-danger-button {
            width: 100%;
            justify-content: center;
        }

        .ms-3 {
            margin-left: 0 !important;
            margin-top: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        section.space-y-6 {
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
        input#password, input[name="password"] {
            padding: 0.75rem !important;
            font-size: 0.95rem !important;
        }
    }


    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    x-danger-button:active, [x-danger-button]:active, .x-danger-button:active {
        animation: shake 0.5s ease;
    }

    /* Стили для фона страницы */
    body {
        background: var(--dark-bg);
        color: var(--dark-text);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }

    /* Улучшенные стили для модального окна */
    [x-modal]::before, .x-modal::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(5px);
        z-index: -1;
    }

    /* Иконки для кнопок */
    x-danger-button::before, [x-danger-button]::before, .x-danger-button::before {
        content: '🗑️';
        font-size: 1.2rem;
    }

    x-secondary-button::before, [x-secondary-button]::before, .x-secondary-button

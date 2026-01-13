@php
    $user = $user ?? null;
@endphp

<link rel="stylesheet" href="{{ asset('css/black-form-styles.css') }}">

<div class="form-wrapper">
    <form method="POST" action="{{ route('users.store') }}" class="user-form">
        @csrf

        <div class="form-header">
            <h2>{{ $user ? 'Редактирование пользователя' : 'Создание нового пользователя' }}</h2>
        </div>

        <div class="form-group">
            <label for="role" class="form-label">Выберите роль</label>
            <div class="select-wrapper">
                <select name="role" id="role" class="form-select" required>
                    <option value="">-- Выберите роль --</option>
                    @foreach($roles as $key => $value)
                        <option value="{{ $key }}" {{ old('role', $user?->role) == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <div class="select-arrow">▼</div>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Имя *</label>
            <input value="{{ old('name', $user?->name) }}"
                   type="text"
                   class="form-input"
                   id="name"
                   name="name"
                   placeholder="Введите имя пользователя"
                   required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email *</label>
            <input value="{{ old('email', $user?->email) }}"
                   type="email"
                   class="form-input"
                   id="email"
                   name="email"
                   placeholder="example@mail.com"
                   required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Пароль {{ $user ? '(оставьте пустым, чтобы не менять)' : '*' }}</label>
            <div class="password-wrapper">
                <input type="password"
                       class="form-input"
                       id="password"
                       name="password"
                       placeholder="Введите пароль"
                    {{ $user ? '' : 'required' }}>
                <button type="button" class="password-toggle" onclick="togglePassword()">
                    👁
                </button>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <span class="btn-icon">✓</span>
                Сохранить
            </button>
            <a href="{{ url()->previous() }}" class="btn-cancel">
                Отмена
            </a>
        </div>
    </form>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    }
</script>
<style>
    /* Основные стили формы */
    .form-wrapper {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px 20px;
        background-color: #000;
        min-height: 100vh;
    }

    .user-form {
        background: #111;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        border: 1px solid #333;
    }

    /* Заголовок формы */
    .form-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #333;
    }

    .form-header h2 {
        color: #fff;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    /* Группы формы */
    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        color: #ccc;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        background: #1a1a1a;
        border: 1px solid #333;
        border-radius: 6px;
        color: #fff;
        font-size: 15px;
        transition: all 0.3s;
    }

    .form-input:focus {
        outline: none;
        border-color: #555;
        box-shadow: 0 0 0 2px rgba(85, 85, 85, 0.1);
    }

    .form-input::placeholder {
        color: #666;
    }

    /* Стили для select */
    .select-wrapper {
        position: relative;
    }

    .form-select {
        width: 100%;
        padding: 12px 40px 12px 16px;
        background: #1a1a1a;
        border: 1px solid #333;
        border-radius: 6px;
        color: #fff;
        font-size: 15px;
        appearance: none;
        cursor: pointer;
    }

    .select-arrow {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        pointer-events: none;
    }

    .form-select:focus {
        outline: none;
        border-color: #555;
        box-shadow: 0 0 0 2px rgba(85, 85, 85, 0.1);
    }

    /* Поле пароля с кнопкой показа */
    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        padding: 4px;
        font-size: 18px;
        transition: color 0.3s;
    }

    .password-toggle:hover {
        color: #fff;
    }

    /* Кнопки формы */
    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #333;
    }

    .btn-submit {
        flex: 1;
        padding: 14px 24px;
        background: linear-gradient(135deg, #222 0%, #111 100%);
        border: 1px solid #444;
        border-radius: 6px;
        color: #fff;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #333 0%, #222 100%);
        border-color: #555;
    }

    .btn-icon {
        font-size: 18px;
    }

    .btn-cancel {
        padding: 14px 24px;
        background: #1a1a1a;
        border: 1px solid #333;
        border-radius: 6px;
        color: #ccc;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        text-align: center;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: #222;
        color: #fff;
        border-color: #444;
    }

    /* Валидация и состояния */
    .form-input:invalid:not(:focus):not(:placeholder-shown) {
        border-color: #722;
    }

    .form-input:valid:not(:focus):not(:placeholder-shown) {
        border-color: #272;
    }

    /* Адаптивность */
    @media (max-width: 640px) {
        .form-wrapper {
            padding: 20px 15px;
        }

        .user-form {
            padding: 25px 20px;
        }

        .form-header h2 {
            font-size: 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .form-header h2 {
            font-size: 18px;
        }

        .form-input,
        .form-select {
            padding: 10px 14px;
            font-size: 14px;
        }
    }
</style>

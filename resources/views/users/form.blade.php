@php
    $user = $user ?? null;
@endphp

<div class="form-wrapper">
    <form method="POST" action="{{ $user ? route('users.update', $user) : route('users.store') }}">
        @csrf
        @if($user)
            @method('PUT')
        @endif

        <h2>{{ $user ? 'Редактирование пользователя' : 'Создание нового пользователя' }}</h2>



        <div style="margin-bottom: 15px;">
            <label for="role" style="display: block; margin-bottom: 5px;">Роль *</label>
            <select name="role" id="role" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">-- Выберите роль --</option>
                @if(isset($roles) && is_array($roles))
                    @foreach($roles as $key => $value)
                        <option value="{{ $key }}" {{ old('role', $user?->role) == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                @else
                    @foreach(App\Enums\UserRoleEnum::cases() as $role)
                        <option value="{{ $role->value }}" {{ old('role', $user?->role?->value) == $role->value ? 'selected' : '' }}>
                            {{ $role->label() }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Имя *</label>
            <input value="{{ old('name', $user?->name) }}"
                   type="text"
                   id="name"
                   name="name"
                   placeholder="Введите имя"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                   required>
            @error('name')
            <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email *</label>
            <input value="{{ old('email', $user?->email) }}"
                   type="email"
                   id="email"
                   name="email"
                   placeholder="example@mail.com"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                   required>
            @error('email')
            <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; margin-bottom: 5px;">
                Пароль {{ $user ? '(оставьте пустым, чтобы не менять)' : '*' }}
            </label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="Введите пароль"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                {{ $user ? '' : 'required' }}>
            @error('password')
            <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                {{ $user ? 'Обновить' : 'Создать' }}
            </button>
            <a href="{{ url()->previous() ?: route('users.index') }}" style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px;">
                Отмена
            </a>
        </div>
    </form>
</div>

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

    .form-wrapper {
        max-width: 500px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }

    h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 1.5rem !important;
        text-align: center;
        background: var(--dark-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--dark-border);
        position: relative;
    }

    h2::after {
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

    input, select, textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        background: rgba(30, 41, 59, 0.5) !important;
        border: 1px solid var(--dark-border) !important;
        border-radius: 10px !important;
        color: var(--dark-text) !important;
        font-size: 1rem;
        transition: all 0.3s ease;
        outline: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    input::placeholder, select::placeholder, textarea::placeholder {
        color: var(--dark-text-secondary);
        opacity: 0.7;
    }

    input:focus, select:focus, textarea:focus {
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

    button {
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
        background: var(--dark-gradient) !important;
        color: white !important;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3) !important;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4) !important;
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, #764ba2 100%) !important;
    }

    a {
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
        background: rgba(148, 163, 184, 0.15) !important;
        color: var(--dark-text-secondary) !important;
        border: 1px solid rgba(148, 163, 184, 0.3) !important;
    }

    a:hover {
        background: rgba(148, 163, 184, 0.25) !important;
        color: var(--dark-text) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
        text-decoration: none;
    }


    select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.25rem;
        padding-right: 2.5rem !important;
        cursor: pointer;
    }

    select option {
        background: var(--dark-bg-card);
        color: var(--dark-text);
        padding: 0.75rem;
    }


    textarea {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
        line-height: 1.5;
    }


    @media (max-width: 768px) {
        .form-wrapper {
            padding: 0.5rem;
            margin: 1rem auto;
        }

        h2 {
            font-size: 1.5rem;
        }

        button, a {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    }

    @media (max-width: 480px) {
        h2 {
            font-size: 1.3rem;
        }

        input, select, textarea {
            padding: 0.75rem !important;
            font-size: 0.95rem;
        }

        button, a {
            padding: 0.75rem 1.5rem !important;
            font-size: 0.95rem;
        }
    }


    body {
        background: var(--dark-bg);
        color: var(--dark-text);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }


    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        color: var(--dark-text);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    label::after {
        content: '•';
        color: var(--dark-accent);
        font-size: 1.2rem;
    }


    .error {
        color: var(--dark-danger);
        font-size: 0.9rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .error::before {
        content: '⚠️';
        font-size: 0.9rem;
    }

</style>

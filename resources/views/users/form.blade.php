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
    .form-wrapper {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
    }

    button:hover {
        background: #0056b3 !important;
    }

    a:hover {
        background: #545b62 !important;
    }
</style>

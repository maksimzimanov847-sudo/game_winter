@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/black-table-styles.css') }}">

    <div class="users-container">
        <div class="users-header">
            <h2 class="users-title">Список пользователей</h2>
            <a href="{{ route('users.create') }}" class="btn-add">
                <span class="btn-add-icon">+</span>
                Добавить пользователя
            </a>
        </div>

        <div class="table-wrapper">
            <table class="users-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Пароль</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="user-id">#{{ $user->id }}</td>
                        <td class="user-name">
                            <div class="user-name-content">
                                <div class="user-avatar-small">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span>{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td class="user-role">
                            <span class="role-badge">{{ $user->role }}</span>
                        </td>
                        <td class="user-password">
                            <div class="password-display">
                                <span class="password-mask">••••••••</span>
                            </div>
                        </td>
                        <td class="user-actions">
                            <div class="action-buttons">
                                <!-- Только кнопка просмотра -->
                                <a href="{{ route('users.show', $user) }}" class="btn-action btn-view">
                                    <span class="btn-icon">👁</span>
                                    Просмотр
                                </a>

                                <!-- Форма для удаления -->
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" onclick="return confirmDelete()">
                                        <span class="btn-icon">🗑️</span>
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-users">
                            <div class="no-users-content">
                                <span class="no-users-icon">👤</span>
                                <p>Нет пользователей в системе</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Вы уверены, что хотите удалить этого пользователя?');
        }
    </script>
@endsection

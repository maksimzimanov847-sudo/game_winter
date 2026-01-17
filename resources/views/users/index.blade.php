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
                                <!-- Кнопка просмотра -->
                                <a href="{{ route('users.show', $user) }}" class="btn-action btn-view">
                                    <span class="btn-icon">👁</span>
                                    Просмотр
                                </a>

                                <!-- Кнопка редактирования -->
                                <a href="{{ route('users.edit', $user) }}" class="btn-action btn-edit">
                                    <span class="btn-icon">✏️</span>
                                    Редактировать
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
<style>
    /* Темная тема для таблицы пользователей */
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
        --dark-overlay: rgba(15, 23, 42, 0.95);
    }

    .users-container {
        background: var(--dark-bg-card);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 8px 32px var(--dark-shadow);
        border: 1px solid var(--dark-border);
        margin: 2rem auto;
        max-width: 1200px;
        color: var(--dark-text);
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--dark-border);
    }

    .users-title {
        color: var(--dark-text);
        font-size: 1.8rem;
        font-weight: 700;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 4px var(--dark-shadow);
        margin: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--dark-accent) 0%, var(--dark-accent-hover) 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        border: none;
        cursor: pointer;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, var(--dark-accent-hover) 0%, var(--dark-accent) 100%);
        color: white;
        text-decoration: none;
    }

    .btn-add-icon {
        background: rgba(255, 255, 255, 0.2);
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .table-wrapper {
        overflow-x: auto;
        border-radius: 10px;
        border: 1px solid var(--dark-border);
        background: var(--dark-bg);
        box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    .users-table thead {
        background: linear-gradient(135deg, var(--dark-bg-lighter) 0%, #1a2332 100%);
        border-bottom: 2px solid var(--dark-border);
    }

    .users-table th {
        color: var(--dark-text-secondary);
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1.2rem 1rem;
        text-align: left;
        border-right: 1px solid var(--dark-border);
    }

    .users-table th:last-child {
        border-right: none;
    }

    .users-table tbody tr {
        border-bottom: 1px solid var(--dark-border);
        transition: all 0.2s ease;
    }

    .users-table tbody tr:hover {
        background: rgba(30, 41, 59, 0.6);
        transform: translateY(-1px);
    }

    .users-table tbody tr:last-child {
        border-bottom: none;
    }

    .users-table td {
        padding: 1.2rem 1rem;
        color: var(--dark-text);
        border-right: 1px solid rgba(45, 55, 72, 0.3);
    }

    .users-table td:last-child {
        border-right: none;
    }

    .user-id {
        color: var(--dark-text-secondary);
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .user-name-content {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar-small {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #ebe8ec 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 10px rgba(40, 41, 44, 0.3);
    }

    .user-email {
        color: var(--dark-accent);
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.95rem;
    }

    .role-badge {
        display: inline-block;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: rgba(59, 130, 246, 0.15);
        color: var(--dark-accent);
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .password-display {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .password-mask {
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        letter-spacing: 2px;
        color: var(--dark-text-secondary);
        background: rgba(30, 41, 59, 0.5);
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        border: 1px solid var(--dark-border);
    }

    .user-actions .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .btn-view {
        background: rgba(16, 185, 129, 0.15);
        color: var(--dark-success);
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .btn-view:hover {
        background: rgba(16, 185, 129, 0.25);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        text-decoration: none;
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.15);
        color: var(--dark-warning);
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .btn-edit:hover {
        background: rgba(245, 158, 11, 0.25);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        text-decoration: none;
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.15);
        color: var(--dark-danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.25);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        text-decoration: none;
    }

    .delete-form {
        margin: 0;
    }

    .btn-icon {
        font-size: 1rem;
    }

    .no-users {
        text-align: center;
        padding: 3rem 1rem;
    }

    .no-users-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .no-users-icon {
        font-size: 3rem;
        opacity: 0.5;
    }

    .no-users p {
        color: var(--dark-text-secondary);
        font-size: 1.1rem;
        margin: 0;
    }

    /*hjhhhh  */
    @media (max-width: 768px) {
        .users-container {
            padding: 1rem;
            margin: 1rem;
        }

        .users-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .users-title {
            text-align: center;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.5rem;
        }

        .btn-action {
            justify-content: center;
            width: 100%;
        }
    }

    /* Плавная анимация для строк таблицы */
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

    .users-table tbody tr {
        animation: fadeIn 0.3s ease forwards;
    }

    .users-table tbody tr:nth-child(odd) {
        background: rgba(15, 23, 42, 0.3);
    }

    .users-table tbody tr:nth-child(even) {
        background: rgba(30, 41, 59, 0.15);
    }

    .users-table tbody tr:hover {
        background: rgba(59, 130, 246, 0.1) !important;
        border-left: 3px solid var(--dark-accent);
    }


    .table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .table-wrapper::-webkit-scrollbar-track {
        background: var(--dark-bg);
        border-radius: 4px;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
        background: var(--dark-border);
        border-radius: 4px;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--dark-accent);
    }

</style>

@extends('layouts.app')

@section('title','Пользователи')

@section('content')
    <div class="container">
        <div class="header mb-3">
            <h2 class="text-primary fw-bold mb-3">Список пользователей</h2>
            <a href="{{ route('users.create') }}" class="btn btn-primary text-white px-3 py-2 rounded">Добавить</a>
        </div>

        <div class="table-container bg-white shadow p-4 rounded">
            <table class="table table-striped">
                <thead class="bg-primary text-white">
                <tr>
                    <th>Номер</th>
                    <th>Имя</th>
                    <th>Роль</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="actions">
                            <!-- Кнопка просмотра -->
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm me-2">Показать</a>

                            <!-- Кнопка редактирования -->
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm me-2">
                                Редактировать
                            </a>

                            <!-- Форма для удаления -->
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-secondary">Нет пользователей в системе</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

@endsection

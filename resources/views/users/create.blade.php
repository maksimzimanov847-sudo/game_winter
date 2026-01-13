
@php

    $user = $users ?? null;
@endphp
<div>
    <a href="{{ route('users.index') }}">Вернуться к списку пользователей</a>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.form')
    </form>
</div>

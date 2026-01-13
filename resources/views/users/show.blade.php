@php
    $user = $user ?? null;
@endphp

<link rel="stylesheet" href="{{ asset('css/black-styles.css') }}">

<div class="user-profile-container">
    <div class="profile-header">
        <a href="{{ url('/users') }}" class="btn-back">
            <span class="btn-back-icon">←</span>
            Назад к списку пользователей
        </a>
        <h1 class="profile-title">Профиль пользователя</h1>
    </div>

    <div class="profile-card">
        <div class="profile-card-header">
            <div class="profile-avatar">
                <div class="avatar-placeholder">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>
            <div class="profile-basic-info">
                <h2>{{ $user->name }}</h2>
                <div class="profile-role">
                    <span class="role-badge">{{ $user->role }}</span>
                </div>
            </div>
        </div>

        <div class="profile-card-body">
            <div class="info-grid">
                <div class="info-section">
                    <h3 class="section-title">Личная информация</h3>
                    <div class="info-item">
                        <span class="info-label">Имя:</span>
                        <span class="info-value">{{ $user->name }}</span>
                    </div>
                </div>

                <div class="info-section">
                    <h3 class="section-title">Контактная информация</h3>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ $user->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Роль:</span>
                        <span class="info-value">{{ $user->role }}</span>
                    </div>
                </div>

                <div class="info-section">
                    <h3 class="section-title">Системная информация</h3>
                    <div class="info-item">
                        <span class="info-label">Аккаунт создан:</span>
                        <span class="info-value">
                            {{ $user->created_at->format('d.m.Y H:i') }}
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Последнее обновление:</span>
                        <span class="info-value">
                            {{ $user->updated_at->format('d.m.Y H:i') }}
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">ID пользователя:</span>
                        <span class="info-value info-id">#{{ $user->id }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Основные стили */
    .user-profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #000;
        color: #fff;
        min-height: 100vh;
    }

    /* Хедер */
    .profile-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #333;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        color: #ccc;
        text-decoration: none;
        margin-bottom: 15px;
        transition: color 0.3s;
    }

    .btn-back:hover {
        color: #fff;
    }

    .btn-back-icon {
        margin-right: 8px;
        font-size: 18px;
    }

    .profile-title {
        font-size: 28px;
        font-weight: 600;
        color: #fff;
        margin: 0;
    }

    /* Карточка профиля */
    .profile-card {
        background: #111;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .profile-card-header {
        display: flex;
        align-items: center;
        padding: 30px;
        background: linear-gradient(135deg, #222 0%, #111 100%);
        border-bottom: 1px solid #333;
    }

    .profile-avatar {
        margin-right: 25px;
    }

    .avatar-placeholder {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #666 0%, #444 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        border: 3px solid #444;
    }

    .profile-basic-info h2 {
        font-size: 24px;
        font-weight: 600;
        color: #fff;
        margin: 0 0 10px 0;
    }

    .role-badge {
        display: inline-block;
        padding: 6px 16px;
        background: #333;
        color: #ccc;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        border: 1px solid #444;
    }

    /* Тело карточки */
    .profile-card-body {
        padding: 30px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .info-section {
        background: #1a1a1a;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #333;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        margin: 0 0 20px 0;
        padding-bottom: 10px;
        border-bottom: 1px solid #333;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding: 8px 0;
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-label {
        color: #999;
        font-size: 14px;
        font-weight: 500;
    }

    .info-value {
        color: #fff;
        font-size: 15px;
        font-weight: 500;
        text-align: right;
        word-break: break-word;
        max-width: 60%;
    }

    .info-id {
        color: #666;
        font-family: monospace;
        font-size: 14px;
    }


    @media (max-width: 768px) {
        .user-profile-container {
            padding: 15px;
        }

        .profile-card-header {
            flex-direction: column;
            text-align: center;
            padding: 25px 20px;
        }

        .profile-avatar {
            margin-right: 0;
            margin-bottom: 20px;
        }

        .info-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .profile-title {
            font-size: 24px;
        }

        .profile-basic-info h2 {
            font-size: 22px;
        }
    }

    @media (max-width: 480px) {
        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }

        .info-value {
            text-align: left;
            max-width: 100%;
        }
    }
</style>

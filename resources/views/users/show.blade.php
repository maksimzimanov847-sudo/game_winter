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
    /* Единая темная тема для всех компонентов */
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

    /* Основные стили профиля */
    .user-profile-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0;
        min-height: calc(100vh - 4rem);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }
    .form-wrapper {
        max-width: 500px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }
    /* Хедер профиля */
    .profile-header {
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--dark-border);
        position: relative;
    }

    .profile-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--dark-gradient);
        border-radius: 2px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--dark-text-secondary);
        text-decoration: none;
        margin-bottom: 1rem;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid var(--dark-border);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-back:hover {
        color: var(--dark-text);
        background: var(--dark-bg-lighter);
        border-color: var(--dark-accent);
        transform: translateX(-5px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        text-decoration: none;
    }

    .btn-back-icon {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .btn-back:hover .btn-back-icon {
        transform: translateX(-3px);
    }

    .profile-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark-text);
        margin: 0;
        background: var(--dark-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
    }


    .profile-card {
        background: var(--dark-bg-card);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        border: 1px solid var(--dark-border);
        backdrop-filter: blur(10px);
    }

    .profile-card-header {
        display: flex;
        align-items: center;
        padding: 2.5rem;
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(15, 23, 42, 0.9) 100%);
        border-bottom: 1px solid var(--dark-border);
        position: relative;
        overflow: hidden;
    }

    .profile-card-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.1), transparent 70%);
    }

    .profile-avatar {
        margin-right: 2rem;
        position: relative;
        z-index: 1;
    }

    .avatar-placeholder {
        width: 100px;
        height: 100px;
        background: var(--dark-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        border: 4px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        transition: all 0.3s ease;
    }

    .profile-avatar:hover .avatar-placeholder {
        transform: scale(1.05);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.6);
    }

    .profile-basic-info {
        position: relative;
        z-index: 1;
    }

    .profile-basic-info h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark-text);
        margin: 0 0 0.75rem 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .role-badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: rgba(59, 130, 246, 0.15);
        color: var(--dark-accent);
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border: 1px solid rgba(59, 130, 246, 0.3);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        transition: all 0.3s ease;
    }

    .role-badge:hover {
        background: rgba(59, 130, 246, 0.25);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(59, 130, 246, 0.25);
    }

    /* Тело карточки */
    .profile-card-body {
        padding: 2.5rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    .info-section {
        background: var(--dark-bg-lighter);
        padding: 1.75rem;
        border-radius: 12px;
        border: 1px solid var(--dark-border);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .info-section:hover {
        border-color: var(--dark-accent);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        transform: translateY(-2px);
    }

    .info-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--dark-gradient);
        border-radius: 2px 0 0 2px;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark-text);
        margin: 0 0 1.5rem 0;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title::before {
        content: '●';
        color: var(--dark-accent);
        font-size: 0.8rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(148, 163, 184, 0.1);
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: rgba(30, 41, 59, 0.3);
        border-radius: 8px;
        padding: 0.75rem;
        margin-left: -0.5rem;
        margin-right: -0.5rem;
    }

    .info-item:last-child {
        margin-bottom: 0;
        border-bottom: none;
    }

    .info-label {
        color: var(--dark-text-secondary);
        font-size: 0.95rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-label::before {
        content: '→';
        color: var(--dark-accent);
        font-size: 0.9rem;
        opacity: 0.7;
    }

    .info-value {
        color: var(--dark-text);
        font-size: 1rem;
        font-weight: 500;
        text-align: right;
        word-break: break-word;
        max-width: 60%;
        font-family: 'SF Mono', 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    }

    .info-id {
        background: rgba(30, 41, 59, 0.5);
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        border: 1px solid var(--dark-border);
        color: var(--dark-text-secondary);
        font-family: 'SF Mono', 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .profile-card {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .info-section:nth-child(1) { animation-delay: 0.1s; }
    .info-section:nth-child(2) { animation-delay: 0.2s; }
    .info-section:nth-child(3) { animation-delay: 0.3s; }


    @media (max-width: 768px) {
        .user-profile-container {
            padding: 1rem;
            margin: 1rem auto;
        }

        .profile-card-header {
            flex-direction: column;
            text-align: center;
            padding: 2rem 1.5rem;
        }

        .profile-avatar {
            margin-right: 0;
            margin-bottom: 1.5rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .profile-title {
            font-size: 1.8rem;
        }

        .profile-basic-info h2 {
            font-size: 1.5rem;
            justify-content: center;
        }

        .avatar-placeholder {
            width: 85px;
            height: 85px;
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .info-value {
            text-align: left;
            max-width: 100%;
            width: 100%;
            background: rgba(30, 41, 59, 0.3);
            padding: 0.5rem;
            border-radius: 6px;
            border-left: 3px solid var(--dark-accent);
        }

        .profile-card-body {
            padding: 1.5rem;
        }

        .profile-card-header {
            padding: 1.5rem 1rem;
        }
    }
*{  background: var(--dark-bg);
    color: var(--dark-text);

    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
}


</style>

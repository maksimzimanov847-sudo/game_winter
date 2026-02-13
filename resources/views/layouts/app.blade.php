<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
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

                body {
                    background: var(--dark-bg);
                    color: var(--dark-text);
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
                    min-height: 100vh;
                    margin: 0;
                    padding: 0;
                    position: relative;
                }

                body::before {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background:
                        radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
                    z-index: -1;
                    pointer-events: none;
                }

                .container-custom {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 2rem 1rem;
                }

                /* Анимации */
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(20px); }
                    to   { opacity: 1; transform: translateY(0); }
                }

                @keyframes pulse {
                    0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
                    70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
                    100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
                }

                .fade-in {
                    animation: fadeInUp 0.5s ease-out forwards;
                }

                /* Карточки */
                .card {
                    background: var(--dark-bg-card);
                    border: 1px solid var(--dark-border);
                    border-radius: 1rem;
                    padding: 1.5rem;
                    box-shadow: 0 20px 40px var(--dark-shadow);
                    backdrop-filter: blur(10px);
                    transition: all 0.3s ease;
                }

                .card:hover {
                    border-color: var(--dark-accent);
                    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
                    transform: translateY(-2px);
                }

                /* Кнопки */
                .btn {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 0.5rem;
                    padding: 0.75rem 1.5rem;
                    border-radius: 0.75rem;
                    font-weight: 600;
                    font-size: 0.95rem;
                    transition: all 0.3s ease;
                    cursor: pointer;
                    border: none;
                    text-decoration: none;
                }

                .btn-primary {
                    background: var(--dark-gradient);
                    color: white;
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
                }

                .btn-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
                }

                .btn-secondary {
                    background: rgba(148, 163, 184, 0.15);
                    color: var(--dark-text-secondary);
                    border: 1px solid rgba(148, 163, 184, 0.3);
                }

                .btn-secondary:hover {
                    background: rgba(148, 163, 184, 0.25);
                    color: var(--dark-text);
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(148, 163, 184, 0.2);
                }

                .btn-warning {
                    background: rgba(245, 158, 11, 0.15);
                    color: var(--dark-warning);
                    border: 1px solid rgba(245, 158, 11, 0.3);
                }

                .btn-warning:hover {
                    background: rgba(245, 158, 11, 0.25);
                    color: white;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
                }

                .btn-danger {
                    background: rgba(239, 68, 68, 0.15);
                    color: var(--dark-danger);
                    border: 1px solid rgba(239, 68, 68, 0.3);
                }

                .btn-danger:hover {
                    background: rgba(239, 68, 68, 0.25);
                    color: white;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
                }

                /* Звёздный рейтинг */
                .star-rating {
                    display: flex;
                    align-items: center;
                    gap: 0.25rem;
                }

                .star {
                    color: var(--dark-warning);
                }

                .star-empty {
                    color: var(--dark-border);
                }

                /* Пагинация */
                .pagination {
                    display: flex;
                    justify-content: center;
                    gap: 0.5rem;
                    margin-top: 2rem;
                    list-style: none;
                }

                .page-item .page-link {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-width: 40px;
                    height: 40px;
                    padding: 0.5rem 0.75rem;
                    background: var(--dark-bg-lighter);
                    color: var(--dark-text-secondary);
                    border: 1px solid var(--dark-border);
                    border-radius: 0.5rem;
                    text-decoration: none;
                    transition: all 0.3s ease;
                }

                .page-item.active .page-link {
                    background: var(--dark-gradient);
                    color: white;
                    border-color: transparent;
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
                }

                .page-item .page-link:hover {
                    background: rgba(59, 130, 246, 0.1);
                    color: var(--dark-accent);
                    border-color: var(--dark-accent);
                    transform: translateY(-2px);
                }

                /* Поля формы */
                .form-label {
                    display: block;
                    color: var(--dark-text);
                    font-weight: 600;
                    font-size: 0.95rem;
                    margin-bottom: 0.5rem;
                }

                .form-control {
                    width: 100%;
                    padding: 0.875rem 1rem;
                    background: rgba(30, 41, 59, 0.5);
                    border: 1px solid var(--dark-border);
                    border-radius: 0.75rem;
                    color: var(--dark-text);
                    font-size: 1rem;
                    transition: all 0.3s ease;
                    outline: none;
                }

                .form-control:focus {
                    border-color: var(--dark-accent);
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
                    background: rgba(30, 41, 59, 0.8);
                }

                .form-control::placeholder {
                    color: var(--dark-text-secondary);
                    opacity: 0.7;
                }

                select.form-control {
                    appearance: none;
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
                    background-repeat: no-repeat;
                    background-position: right 1rem center;
                    background-size: 1.25rem;
                    padding-right: 2.5rem;
                }

                textarea.form-control {
                    resize: vertical;
                    min-height: 120px;
                }

                .alert {
                    padding: 1rem;
                    border-radius: 0.75rem;
                    margin-bottom: 1.5rem;
                    backdrop-filter: blur(10px);
                }

                .alert-success {
                    background: rgba(16, 185, 129, 0.15);
                    border: 1px solid rgba(16, 185, 129, 0.3);
                    color: var(--dark-success);
                }

                .alert-danger {
                    background: rgba(239, 68, 68, 0.15);
                    border: 1px solid rgba(239, 68, 68, 0.3);
                    color: var(--dark-danger);
                }
            </style>
            <!-- Page Content -->
            < <main>
                @if(isset($slot))
                    {{$slot}}
                @endif
                @yield('content')
            </main>
        </div>
    </body>
</html>

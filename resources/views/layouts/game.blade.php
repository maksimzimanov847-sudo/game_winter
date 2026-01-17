<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title,Зиманушка')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
<div class="min-h-screen flex flex-col">
    @include('game.partials.header')


    <main class="flex-1 p-6">
        @yield('content')
        <div class="container mx-auto">

        </div>
    </main>


    <footer class="bg-gray-100 p-6 text-gray-600">
        @include('game.partials.footer')
    </footer>
</div>
</body>

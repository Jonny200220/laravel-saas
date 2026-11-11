<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CashTrackr') }} - @yield('title')</title>
    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100">
    <header class="bg-purple-950 py-4">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="w-full max-w-100 ">
                <img src="{{ asset('img/logo.svg') }}" alt="CashTrackr Logo" class="w-full block">
            </div>
            <nav class="flex flex-col lg:flex-row items-center gap-4">
                <a
                class="text-white font-bold uppercase p-2 hover:text-amber-500"
                href="{{ route('login') }}">
                Iniciar Sesión</a>
                <a
                class="font-bold uppercase border-2 border-amber-500 px-5 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600 hover:text-purple-950"
                href="{{ route('register') }}">
                Crear Cuenta</a>
            </nav>
        </div>
    </header>
    @yield('contents')
</body>

</html>
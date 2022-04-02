<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset(config('pw-config.logo')) }}"
    />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet"
    />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
<x-hrace009::auth.general-frame>
    <!-- Loading screen -->
    <x-hrace009::loading>{{ __('general.loading') }}</x-hrace009::loading>
    <x-hrace009::auth.dark-frame>
        <!-- Brand -->
        <x-hrace009::auth.brand>
            <x-slot name="logo">
                <x-hrace009::logo/>
            </x-slot>
            {{ config('app.name') }}
        </x-hrace009::auth.brand>
        <main>
            <x-hrace009::auth.inside-main>
                {{ $slot }}
            </x-hrace009::auth.inside-main>
        </main>
    </x-hrace009::auth.dark-frame>
    <!-- Toggle dark mode button -->
    <x-hrace009::dark-mode/>
</x-hrace009::auth.general-frame>
<x-hrace009::auth.script/>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('pw-config.server_name', 'Laravel') }} @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset(config('pw-config.logo')) }}"
    />

    <x-hrace009::front.top-script/>

</head>
<body class="antialiased">
<x-hrace009::front.big-frame>
    <x-hrace009::loading>
        {{ __('general.loading') }}
    </x-hrace009::loading>

    <!-- Sidebar -->
    <x-hrace009::side-bar>
        <x-slot name="links">
            <x-hrace009::front.dashboard-link/>
        </x-slot>
        <x-slot name="footer">
            <x-hrace009::side-bar-footer/>
        </x-slot>
    </x-hrace009::side-bar>

    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
        <x-hrace009::nav-bar>
            <x-slot name="navmenu">
                <x-hrace009::mobile-menu-button/>
                <x-hrace009::brand>
                    <x-slot name="brand">
                        {{ config('pw-config.server_name') }}
                    </x-slot>
                </x-hrace009::brand>
                <x-hrace009::mobile-sub-menu-button/>
                <x-hrace009::desktop-right-button>
                    <x-slot name="button">
                        <x-hrace009::dark-theme-button/>
                        <x-hrace009::language-button/>
                        <x-hrace009::character-selector/>
                        <x-hrace009::balance/>
                        <x-hrace009::admin-button/>
                        <x-hrace009::user-avatar/>
                    </x-slot>
                </x-hrace009::desktop-right-button>
                <x-hrace009.mobile-sub-menu>
                    <x-slot name="button">
                        <x-hrace009::dark-theme-button/>
                        <x-hrace009::mobile-language-menu/>
                        <x-hrace009::character-selector/>
                        <x-hrace009::admin-button/>
                        <x-hrace009::mobile-user-avatar/>
                    </x-slot>
                </x-hrace009.mobile-sub-menu>
            </x-slot>
            <x-slot name="navMobilMenu">
                <x-hrace009.mobile-main-menu>
                    <x-slot name="links">
                        <x-hrace009::front.dashboard-link/>
                    </x-slot>
                </x-hrace009.mobile-main-menu>
            </x-slot>
        </x-hrace009::nav-bar>

        <!-- Main content -->
        <main>
            <!-- Content header -->
        @if (isset($header))
            {{ $header }}
        @endif

        <!-- Content -->
            <div class="mt-2">
                {{ $slot }}
            </div>
        </main>
        <x-hrace009::footer/>
    </div>

    <!-- Panels -->
    <x-hrace009::settings-panel/>
</x-hrace009::front.big-frame>
<x-hrace009::front.bottom-script/>
</body>
</html>

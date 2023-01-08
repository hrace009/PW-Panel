<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('pw-config.server_name', 'Laravel') }} @yield('title')</title>

    @if( config('pw-config.logo') === 'img/logo/logo.png' )
        <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset(config('pw-config.logo')) }}"
        />
    @elseif( ! config('pw-config.logo') )
        <link rel="shortcut icon" href="{{ asset('img/logo/logo.png') }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('img/logo/logo.png') }}"
        />
    @else
        <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"
        />
    @endif

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
            @if( config('pw-config.system.apps.shop') )
                <x-hrace009::front.shop-link/>
            @endif

            @if( config('pw-config.system.apps.donate') )
                <x-hrace009::front.donate-link/>
            @endif

            @if( config('pw-config.system.apps.vote') )
                <x-hrace009::front.vote-link/>
            @endif

            @if( config('pw-config.system.apps.voucher') )
                <x-hrace009::front.voucher-link/>
            @endif

            @if ( config('pw-config.system.apps.inGameService') )
                <x-hrace009::front.services-link/>
            @endif

            @if( config('pw-config.system.apps.ranking') )
                <x-hrace009::front.ranking-link/>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-hrace009::side-bar-footer/>
        </x-slot>
    </x-hrace009::side-bar>

    <div class="flex flex-col flex-1 h-full overflow-x-hidden overflow-y-auto">
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
                        <x-hrace009::site-button/>
                        <x-hrace009::user-avatar/>
                    </x-slot>
                </x-hrace009::desktop-right-button>
                <x-hrace009.mobile-sub-menu>
                    <x-slot name="button">
                        <x-hrace009::dark-theme-button/>
                        <x-hrace009::mobile-language-menu/>
                        <x-hrace009::character-selector/>
                        <x-hrace009::admin-button/>
                        <x-hrace009::site-button/>
                        <x-hrace009::mobile-user-avatar/>
                    </x-slot>
                </x-hrace009.mobile-sub-menu>
            </x-slot>
            <x-slot name="navMobilMenu">
                <x-hrace009.mobile-main-menu>
                    <x-slot name="links">
                        <x-hrace009::front.dashboard-link/>
                        @if( config('pw-config.system.apps.shop') )
                            <x-hrace009::front.shop-link/>
                        @endif

                        @if( config('pw-config.system.apps.donate') )
                            <x-hrace009::front.donate-link/>
                        @endif

                        @if( config('pw-config.system.apps.vote') )
                            <x-hrace009::front.vote-link/>
                        @endif

                        @if( config('pw-config.system.apps.voucher') )
                            <x-hrace009::front.voucher-link/>
                        @endif

                        @if ( config('pw-config.system.apps.inGameService') )
                            <x-hrace009::front.services-link/>
                        @endif

                        @if( config('pw-config.system.apps.ranking') )
                            <x-hrace009::front.ranking-link/>
                        @endif
                    </x-slot>
                </x-hrace009.mobile-main-menu>
            </x-slot>
        </x-hrace009::nav-bar>

        <!-- Main content -->
        <main class="flex-1">

            <!-- Content header -->
            @if (isset($header))
            {{ $header }}
        @endif
        <!-- Content -->
            <div class="mt-2 pb-16">
                <div class="max-w mx-6 my-6">
                    <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
                        <div class="col-span-3">
                            {{ $content }}
                        </div>
                        <div>
                            <x-hrace009::front.widget/>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-hrace009::footer/>
    </div>
    <!-- Panels -->
    <x-hrace009::settings-panel/>
</x-hrace009::front.big-frame>
@yield('footer')
<x-hrace009::front.bottom-script/>
</body>
</html>

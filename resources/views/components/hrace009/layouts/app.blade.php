<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/logo/logo.png') }}"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset('img/logo/logo.png') }}"
    />

    <x-hrace009::front.top-script/>

</head>
<body>
<x-hrace009::front.big-frame>
    <x-hrace009::loading>
        {{ __('general.loading') }}
    </x-hrace009::loading>

    <!-- Sidebar -->
    <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
        <div class="flex flex-col h-full">
            <!-- Sidebar links -->
            <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                <x-hrace009::front.dashboard-link/>
            </nav>

            <!-- Sidebar footer -->
            <div class="flex-shrink-0 px-2 py-4 space-y-2">
                <button
                    @click="openSettingsPanel"
                    type="button"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
                >
                <span aria-hidden="true">
                  <svg
                      class="w-4 h-4 mr-2"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                    />
                  </svg>
                </span>
                    <span>Customize</span>
                </button>
            </div>
        </div>
    </aside>

    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
        <!-- Navbar -->
        <header class="relative bg-white dark:bg-darker">
            <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
                <!-- Mobile menu button -->
                <button
                    @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                    class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                >
                    <span class="sr-only">Open main manu</span>
                    <span aria-hidden="true">
                  <svg
                      class="w-8 h-8"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                  </svg>
                </span>
                </button>

                <!-- Brand -->
                <a
                    href="{{ route('dashboard') }}"
                    class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
                >
                    {{ config('app.name') }}
                </a>

                <!-- Mobile sub menu button -->
                <button
                    @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                    class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                >
                    <span class="sr-only">Open sub manu</span>
                    <span aria-hidden="true">
                  <svg
                      class="w-8 h-8"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                    />
                  </svg>
                </span>
                </button>

                <!-- Desktop Right buttons -->
                <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                    <x-hrace009::dark-theme-button/>
                    <x-hrace009::language-button/>
                    <x-hrace009::character-selector/>
                    <x-hrace009::balance/>
                    <x-hrace009::admin-button/>
                    <x-hrace009::user-avatar/>
                </nav>

                <!-- Mobile sub menu -->
                <nav
                    x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                    x-transition:enter-start="-translate-y-full opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="-translate-y-full opacity-0"
                    x-show="isMobileSubMenuOpen"
                    @click.away="isMobileSubMenuOpen = false"
                    class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                    aria-label="Secondary"
                >
                    <x-hrace009::dark-theme-button/>
                    <x-hrace009::mobile-language-menu/>
                    <x-hrace009::admin-button/>
                    <x-hrace009::mobile-user-avatar/>
                </nav>
            </div>
            <!-- Mobile main menu -->
            <div
                class="border-b md:hidden dark:border-primary-darker"
                x-show="isMobileMainMenuOpen"
                @click.away="isMobileMainMenuOpen = false"
            >
                <nav aria-label="Main" class="px-2 py-4 space-y-2">
                    <!-- Dashboards links -->
                    <div x-data="{ isActive: true, open: true}">
                        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                        <a
                            href="#"
                            @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                            role="button"
                            aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'"
                        >
                    <span aria-hidden="true">
                      <svg
                          class="w-5 h-5"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        />
                      </svg>
                    </span>
                            <span class="ml-2 text-sm"> {{ __('general.menu.dashboard') }} </span>
                            <span class="ml-auto" aria-hidden="true">
                      <!-- active class 'rotate-180' -->
                      <svg
                          class="w-4 h-4 transition-transform transform"
                          :class="{ 'rotate-180': open }"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                    </span>
                        </a>
                        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a
                                href="{{ route('dashboard') }}"
                                role="menuitem"
                                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
                            >
                                {{ __('general.menu.dashboard') }}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

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

    <!-- Settings Panel -->
    <!-- Backdrop -->
    <div
        x-transition:enter="transition duration-300 ease-in-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 ease-in-out"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-show="isSettingsPanelOpen"
        @click="isSettingsPanelOpen = false"
        class="fixed inset-0 z-10 bg-primary-darker"
        style="opacity: 0.5"
        aria-hidden="true"
    ></div>
    <!-- Panel -->
    <section
        x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-ref="settingsPanel"
        tabindex="-1"
        x-show="isSettingsPanelOpen"
        @keydown.escape="isSettingsPanelOpen = false"
        class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
        aria-labelledby="settinsPanelLabel"
    >
        <div class="absolute left-0 p-2 transform -translate-x-full">
            <!-- Close button -->
            <button
                @click="isSettingsPanelOpen = false"
                class="p-2 text-white rounded-md focus:outline-none focus:ring"
            >
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <!-- Panel content -->
        <div class="flex flex-col h-screen">
            <!-- Panel header -->
            <div
                class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-primary-dark"
            >
              <span aria-hidden="true" class="text-gray-500 dark:text-primary">
                <svg
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                  />
                </svg>
              </span>
                <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Settings</h2>
            </div>
            <!-- Content -->
            <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                <!-- Theme -->
                <div class="p-4 space-y-4 md:p-8">
                    <h6 class="text-lg font-medium text-gray-400 dark:text-light">Mode</h6>
                    <div class="flex items-center space-x-8">
                        <!-- Light button -->
                        <button
                            @click="setLightTheme"
                            class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                            :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': !isDark, 'text-gray-500 dark:text-primary-light': isDark }"
                        >
                    <span>
                      <svg
                          class="w-6 h-6"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        />
                      </svg>
                    </span>
                            <span>Light</span>
                        </button>

                        <!-- Dark button -->
                        <button
                            @click="setDarkTheme"
                            class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                            :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': isDark, 'text-gray-500 dark:text-primary-light': !isDark }"
                        >
                    <span>
                      <svg
                          class="w-6 h-6"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                        />
                      </svg>
                    </span>
                            <span>Dark</span>
                        </button>
                    </div>
                </div>

                <!-- Colors -->
                <div class="p-4 space-y-4 md:p-8">
                    <h6 class="text-lg font-medium text-gray-400 dark:text-light">Colors</h6>
                    <div>
                        <button
                            @click="setColors('cyan')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-cyan)"
                        ></button>
                        <button
                            @click="setColors('teal')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-teal)"
                        ></button>
                        <button
                            @click="setColors('green')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-green)"
                        ></button>
                        <button
                            @click="setColors('fuchsia')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-fuchsia)"
                        ></button>
                        <button
                            @click="setColors('blue')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-blue)"
                        ></button>
                        <button
                            @click="setColors('violet')"
                            class="w-10 h-10 rounded-full"
                            style="background-color: var(--color-violet)"
                        ></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notification panel -->
    <!-- Backdrop -->
    <div
        x-transition:enter="transition duration-300 ease-in-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 ease-in-out"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-show="isNotificationsPanelOpen"
        @click="isNotificationsPanelOpen = false"
        class="fixed inset-0 z-10 bg-primary-darker"
        style="opacity: 0.5"
        aria-hidden="true"
    ></div>
    <!-- Panel -->
    <section
        x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        x-ref="notificationsPanel"
        x-show="isNotificationsPanelOpen"
        @keydown.escape="isNotificationsPanelOpen = false"
        tabindex="-1"
        aria-labelledby="notificationPanelLabel"
        class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
    >
        <div class="absolute right-0 p-2 transform translate-x-full">
            <!-- Close button -->
            <button
                @click="isNotificationsPanelOpen = false"
                class="p-2 text-white rounded-md focus:outline-none focus:ring"
            >
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
            <!-- Panel header -->
            <div class="flex-shrink-0">
                <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker">
                    <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Notifications</h2>
                    <div class="space-x-2">
                        <button
                            @click.prevent="activeTabe = 'action'"
                            class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                            :class="{'border-primary-dark dark:border-primary': activeTabe == 'action', 'border-transparent': activeTabe != 'action'}"
                        >
                            Action
                        </button>
                        <button
                            @click.prevent="activeTabe = 'user'"
                            class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                            :class="{'border-primary-dark dark:border-primary': activeTabe == 'user', 'border-transparent': activeTabe != 'user'}"
                        >
                            User
                        </button>
                    </div>
                </div>
            </div>

            <!-- Panel content (tabs) -->
            <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                <!-- Action tab -->
                <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">
                    <a href="#" class="block">
                        <div class="flex px-4 space-x-4">
                            <div class="relative flex-shrink-0">
                      <span
                          class="z-10 inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                      >
                        <svg
                            class="w-7 h-7"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </span>
                                <div
                                    class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                    New project "KWD Dashboard" created
                                </h5>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Looks like there might be a new theme soon
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="flex px-4 space-x-4">
                            <div class="relative flex-shrink-0">
                      <span
                          class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                      >
                        <svg
                            class="w-7 h-7"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </span>
                                <div
                                    class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                    KWD Dashboard v0.0.2 was released
                                </h5>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Successful new version was released
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 2d ago </span>
                            </div>
                        </div>
                    </a>
                    <template x-for="i in 20" x-key="i">
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                        <span
                            class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                        >
                          <svg
                              class="w-7 h-7"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                          </svg>
                        </span>
                                    <div
                                        class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"
                                    ></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                        New project "KWD Dashboard" created
                                    </h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Looks like there might be a new theme soon
                                    </p>
                                    <span
                                        class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>

                <!-- User tab -->
                <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                    <a href="#" class="block">
                        <div class="flex px-4 space-x-4">
                            <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                <div
                                    class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Shared new project "K-WD Dashboard"
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="flex px-4 space-x-4">
                            <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar-1.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                <div
                                    class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-semibold text-gray-600 dark:text-light">John</h5>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Commit new changes to K-WD Dashboard project.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 10h ago </span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="flex px-4 space-x-4">
                            <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                <div
                                    class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Release new version "K-WD Dashboard"
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 20d ago </span>
                            </div>
                        </div>
                    </a>
                    <template x-for="i in 10" x-key="i">
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                        <span class="relative z-10 inline-block overflow-visible rounded-ful">
                          <img
                              class="object-cover rounded-full w-9 h-9"
                              src="build/images/avatar.jpg"
                              alt="Ahmed kamel"
                          />
                        </span>
                                    <div
                                        class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"
                                    ></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Release new version "K-WD Dashboard"
                                    </p>
                                    <span
                                        class="text-sm font-normal text-gray-400 dark:text-primary-light"> 20d ago </span>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </section>
</x-hrace009::front.big-frame>
<x-hrace009::front.bottom-script/>
</body>
</html>

<!-- User avatar button -->
<div class="relative ml-auto" x-data="{ open: false }">
    <button
        @click="open = !open"
        type="button"
        aria-haspopup="true"
        :aria-expanded="open ? 'true' : 'false'"
        class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
    >
        <span class="sr-only">User menu</span>
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                 alt="{{ Auth::user()->name }}"/>
        @else
            {{ Auth::user()->name }}
            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        @endif

    </button>

    <!-- User dropdown menu -->
    <div
        x-show="open"
        x-transition:enter="transition-all transform ease-out"
        x-transition:enter-start="translate-y-1/2 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition-all transform ease-in"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-1/2 opacity-0"
        @click.away="open = false"
        class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
        role="menu"
        aria-orientation="vertical"
        aria-label="User menu"
    >
        <a
            href="{{ route('profile.show') }}"
            role="menuitem"
            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
        >
            {{ __('general.dashboard.profile.header') }}
        </a>
        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a
                href="{{ route('api-tokens.index') }}"
                role="menuitem"
                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
            >
                {{ __('API Tokens') }}
            </a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    this.closest('form').submit();"
                role="menuitem"
                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
            >
                {{ __('general.logout') }}
            </a>
        </form>
    </div>
</div>

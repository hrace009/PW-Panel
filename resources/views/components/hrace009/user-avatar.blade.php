<!-- User avatar button -->
<x-hrace009::drop-down>
    <x-slot name="trigger">
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
    </x-slot>
    <x-slot name="content">
        <x-hrace009::drop-down-link href="{{ route('profile.show') }}">
            {{ __('general.dashboard.profile.header') }}
        </x-hrace009::drop-down-link>
        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-hrace009::drop-down-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </x-hrace009::drop-down-link>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-hrace009::drop-down-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('general.logout') }}
            </x-hrace009::drop-down-link>
        </form>
    </x-slot>
</x-hrace009::drop-down>

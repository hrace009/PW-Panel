<div class="relative" x-data="{ open: false }">
    <button
        @click="open = !open; $nextTick(() => { if(open){ $refs.characterMenu.focus() } })"
        type="button"
        aria-haspopup="true"
        :aria-expanded="open ? 'true' : 'false'"
        class="inline-flex p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
    >
        {{ Auth::user()->characterId() ? Auth::user()->characterName() : __( 'general.character.select' ) }}
        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-ref="characterMenu"
        x-transition:enter="transition-all transform ease-out"
        x-transition:enter-start="translate-y-1/2 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition-all transform ease-in"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-1/2 opacity-0"
        @click.away="open = false"
        @keydown.escape="open = false"
        class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
        tabindex="-1"
        role="menu"
        aria-orientation="vertical"
        aria-label="Character menu"
    >
        @if ( $api->online )
            @if ( count( $roles ) > 0 )
                @foreach( $roles as $role )
                    <a role="menuitem" href="{{ url( 'character/select/' . $role['id'] ) }}"
                       class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                    >
                        {{ $role['name'] }}
                    </a>
                @endforeach
            @else
                {{ __( 'general.character.error.list' ) }}
            @endif
        @else
            <div
                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                {{ __('general.serverOffline') }}
            </div>
        @endif
    </div>
</div>

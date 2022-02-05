<div class="ml-3 relative">
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                    {{ __('general.language') }}

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                </button>
            </span>
        </x-slot>

        <x-slot name="content">
            @foreach( $languages as $language )
                <x-jet-dropdown-link href="{{ Request::url() . '?language=' . $language }}">
                    <img class="inline-flex"
                         src="{{ asset( 'img/flags/' . $language . '.png' ) }}"
                         alt=""/> {{ __( 'language.' . $language ) }}
                </x-jet-dropdown-link>
            @endforeach
        </x-slot>
    </x-jet-dropdown>
</div>

<x-jet-action-section>
    <x-slot name="title">
        {{ __('general.dashboard.profile.charList.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('general.dashboard.profile.charList.description') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            @if ( count( $roles ) > 0 )
                @foreach ( $roles as $role )
                    <div><span
                            class="text-gray-600 dark:text-light">{{ __( 'general.dashboard.profile.charList.id', ['n' => $role['id']] ) }}</span>
                        <span class="text-gray-600 dark:text-light">{{ $role['name'] }}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </x-slot>

    <div class="max-w-xl text-sm text-gray-600">
        {{ __('profile.listCharacter.content') }}
    </div>
</x-jet-action-section>

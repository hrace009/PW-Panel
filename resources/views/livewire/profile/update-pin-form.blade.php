<x-jet-form-section submit="updatePin">
    <x-slot name="title">
        {{ __('general.dashboard.profile.updatePin.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('general.dashboard.profile.updatePin.description') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_pin" value="{{ __('general.dashboard.profile.updatePin.current') }}"/>
            <x-hrace009::input-box id="current_pin" type="password" class="mt-1 block w-full"
                                   wire:model.defer="state.current_pin"
                                   autocomplete="current-pin"/>
            <x-jet-input-error for="current_pin" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pin" value="{{ __('general.dashboard.profile.updatePin.new') }}"/>
            <x-hrace009::input-box id="pin" type="password" class="mt-1 block w-full" wire:model.defer="state.pin"
                                   autocomplete="new-pin"/>
            <x-jet-input-error for="pin" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pin_confirmation" value="{{ __('general.dashboard.profile.updatePin.confirm') }}"/>
            <x-hrace009::input-box id="pin_confirmation" type="password" class="mt-1 block w-full"
                                   wire:model.defer="state.pin_confirmation" autocomplete="new-pin"/>
            <x-jet-input-error for="pin_confirmation" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('general.saved') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('general.Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

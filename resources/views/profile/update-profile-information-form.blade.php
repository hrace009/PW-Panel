<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('profile.info.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('profile.info.description') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-jet-label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('profile.photo.selectnew') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('profile.photo.remove') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2"/>
            </div>
    @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="truename" value="{{ __('auth.form.trueName') }}"/>
            <x-hrace009::input-box id="truename" type="text" class="mt-1 block w-full" wire:model.defer="state.truename"
                                   autocomplete="truename"/>
            <x-jet-input-error for="truename" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-hrace009::input-box id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"/>
            <x-jet-input-error for="email" class="mt-2"/>
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phonenumber" value="{{ __('auth.form.phonenumber') }}"/>
            <x-hrace009::input-box id="phonenumber" type="text" class="mt-1 block w-full"
                                   wire:model.defer="state.phonenumber"
                                   autocomplete="phonenumber"/>
            <x-jet-input-error for="phonenumber" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('general.saved') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('general.Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

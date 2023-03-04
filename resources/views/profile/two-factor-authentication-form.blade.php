<x-jet-action-section>
    <x-slot name="title">
        {{ __('profile.2fauth.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('profile.2fauth.description') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-light">
            @if ($this->enabled)
                {{ __('profile.2fauth.enabled') }}
            @else
                {{ __('profile.2fauth.disabled') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-light">
            <p>
                {{ __('profile.2fauth.desc.disabled') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm dark:text-primary-light">
                    <p class="font-semibold">
                        {{ __('profile.2fauth.desc.enabled') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm dark:text-primary-light">
                    <p class="font-semibold">
                        {{ __('profile.2fauth.showcode') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm dark:bg-dark rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('profile.2fauth.active') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('profile.2fauth.regenerate') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('profile.2fauth.showreccode') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('profile.2fauth.notactive') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>

<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.login') }}
    </x-hrace009::auth.label-title>
    <div x-data="{ recovery: false }">
        <div class="mb-4 text-sm" x-show="! recovery">
            {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
        </div>

        <div class="mb-4 text-sm" x-show="recovery">
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </div>

        <x-hrace009::validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="mt-4" x-show="! recovery">
                <x-hrace009::input-box id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code"
                                       autofocus x-ref="code" autocomplete="one-time-code"
                                       placeholder="{{ __('Code') }}"
                />
            </div>

            <div class="mt-4" x-show="recovery">
                <x-hrace009::input-box id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code"
                                       x-ref="recovery_code" autocomplete="one-time-code"
                                       placeholder="{{ __('Recovery Code') }}"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button"
                        class="text-sm dark:text-light dark:hover:text-primary-100 underline cursor-pointer"
                        x-show="! recovery"
                        x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                    {{ __('Use a recovery code') }}
                </button>

                <button type="button"
                        class="text-sm dark:text-light dark:hover:text-primary-100 underline cursor-pointer"
                        x-show="recovery"
                        x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                    {{ __('Use an authentication code') }}
                </button>

                <x-hrace009::button class="ml-4 w-20">
                    {{ __('Log in') }}
                </x-hrace009::button>
            </div>
        </form>
    </div>
</x-hrace009.layouts.guest>

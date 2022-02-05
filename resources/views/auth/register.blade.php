@section('title', ' - ' . __('auth.form.register') )
<x-guest-layout>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.register') }}
    </x-hrace009::auth.label-title>
    <x-hrace009::validation-errors class="mb-4"/>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <x-hrace009::input-box id="name" type="text" name="name" :value="old('name')"
                               placeholder="{{ __('auth.form.login') }}" autofocus
                               required autocomplete="name"/>

        <x-hrace009::input-box id="email" type="email" name="email" :value="old('email')"
                               placeholder="{{ __('auth.form.email') }}" autofocus
                               required autocomplete="email"/>

        <x-hrace009::input-box id="password" type="password" name="password"
                               placeholder="{{ __('auth.form.password') }}" autofocus
                               required autocomplete="new-password"/>

        <x-hrace009::input-box id="password_confirmation" type="password" name="password_confirmation"
                               placeholder="{{ __('auth.form.confirmPassword') }}" autofocus
                               required autocomplete="new-password"/>

        <x-hrace009::input-box id="pin" type="password" name="pin"
                               placeholder="{{ __('auth.form.pin') }}" autofocus
                               required autocomplete="new-pin"/>

        <x-hrace009::input-box id="truename" type="text" name="truename" :value="old('truename')"
                               placeholder="{{ __('auth.form.trueName') }}" autofocus
                               required autocomplete="truename"/>

        <x-hrace009::captcha/>

        <div class="flex items-center justify-between">
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <x-hrace009::auth.tos-agree/>
            @endif
        </div>
        <x-hrace009::button>
            {{ __('auth.form.register') }}
        </x-hrace009::button>
    </form>
    <div class="text-sm text-gray-600 dark:text-gray-400">
        {{__('auth.form.registered')}} <a href="{{ route('login') }}"
                                          class="text-blue-600 hover:underline">{{ __('auth.form.login') }}</a>
    </div>
</x-guest-layout>

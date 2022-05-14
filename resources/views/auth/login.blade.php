@section('title', ' - ' . __('auth.form.login') )
<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.login') }}
    </x-hrace009::auth.label-title>
    <x-hrace009::validation-errors class="mb-4"/>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 text-center">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <x-hrace009::input-box id="name" type="text" name="name" :value="old('name')"
                               placeholder="{{ __('auth.form.login') }}" autofocus required/>

        <x-hrace009::input-box id="password" type="password" name="password" required
                               autocomplete="current-password"
                               placeholder="{{ __('auth.form.password') }}"/>

        @if (! Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
            <x-hrace009::input-box id="pin" type="password" name="pin" required
                                   autocomplete="current-pin"
                                   placeholder="{{ __('auth.form.pin') }}"/>
        @endif

        @if( !config('app.debug') === true )
            <x-hrace009::captcha/>
        @endif

        <div class="flex items-center justify-between">
            <x-hrace009::auth.remember-me/>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-blue-600 hover:underline">{{ __('auth.form.forgotPassword') }}</a>
            @endif
        </div>
        <x-hrace009::button>
            {{ __('auth.form.login') }}
        </x-hrace009::button>
    </form>
</x-hrace009.layouts.guest>

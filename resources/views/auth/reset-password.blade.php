@section('title', ' - ' . __('auth.form.resetPassword') )
<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.resetPassword') }}
    </x-hrace009::auth.label-title>
    <x-hrace009::validation-errors class="mb-4"/>
    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" id="password" name="password" value="{{ $password }}">
        @if (! Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
            <input type="hidden" id="pin" name="pin" value="{{ $pin }}">
        @endif
        <input type="hidden" id="email" name="email" value="{{ $request->email }}">
        <x-hrace009::captcha/>

        <x-hrace009::button>
            {{ __('auth.form.resetPassword') }}
        </x-hrace009::button>
    </form>
</x-hrace009.layouts.guest>

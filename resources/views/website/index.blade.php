<x-hrace009::layouts.portal>
    <x-slot name="register">
        <a class="text blue" href="{{ route('register') }}">{{ __('auth.form.register') }}</a>
        <a class="link" href="{{ route('register') }}"><img src="{{ asset('img/portal/register.jpg') }}"/></a>
    </x-slot>
    <x-slot name="login">
        <a class="text red" href="{{ route('login') }}">{{ __('auth.form.login') }}</a>
        <a class="link" href="{{ route('login') }}"> <img src="{{ asset('img/portal/login.jpg') }}"/></a>
    </x-slot>
</x-hrace009::layouts.portal>

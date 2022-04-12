@component('mail::message')
    <p>
        Dear {{ $fullname }},<br>
        @lang('auth.email.greetings'):
    </p>
    <table style="border: none">
        <tr>
            <td>@lang('auth.email.loginid')</td>
            <td>:</td>
            <td>{{ $login }}</td>
        </tr>
        <tr>
            <td>@lang('auth.email.password')</td>
            <td>:</td>
            <td>{{ $password }}</td>
        </tr>
        @if (! Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
            <tr>
                <td>@lang('auth.email.pin')</td>
                <td>:</td>
                <td>{{ $pin }}</td>
            </tr>
        @endif
        <tr>
            <td>@lang('auth.email.email')</td>
            <td>:</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td colspan="3">
                <strong style="color: red">@lang('auth.email.warning')</strong><br>
                @lang('auth.email.confidential')<br>
                @lang('auth.email.message')
            </td>
        </tr>
    </table>
    <br>
    <p>
        Thanks,<br>
        GM {{ config('app.name')  }}
    </p>

@endcomponent

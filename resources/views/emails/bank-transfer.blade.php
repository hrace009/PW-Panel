@component('mail::message')
    <p>
        Dear GM {{ config('app.name') }},<br>
        @lang('donate.guide.bank.email.greeting'):
    </p>
    <table style="border: none">
        <tr>
            <td>@lang('donate.guide.bank.form.fullname')</td>
            <td>:</td>
            <td>{{ $fullname }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.banknum')</td>
            <td>:</td>
            <td>{{ $banknum }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.loginid')</td>
            <td>:</td>
            <td>{{ $loginid }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.email')</td>
            <td>:</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.phone')</td>
            <td>:</td>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.type')</td>
            <td>:</td>
            <td>{{ $type }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.bankname')</td>
            <td>:</td>
            <td>{{ $bankname }}</td>
        </tr>
        <tr>
            <td>@lang('donate.guide.bank.form.amount')</td>
            <td>:</td>
            <td>{{ $amount }}</td>
        </tr>
    </table>
    <br>
    <p>
        Thanks,<br>
        GM {{ config('app.name')  }}
    </p>

@endcomponent

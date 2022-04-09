@section('title', ' - ' . __('voucher.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('voucher.add') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('voucher.store') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="code" name="code"
                                                    placeholder=" " readonly
                                                    value="{{ $randomAlphaNum }}"
                                                    :popover="__('voucher.code_desc')"/>
                    <x-hrace009::label
                        for="code">{{ __('voucher.code') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="amount" name="amount"
                                                    placeholder=" "
                                                    :popover="__('voucher.amount_desc', ['currency' => config('pw-config.currency_name')])"/>
                    <x-hrace009::label
                        for="amount">{{ __('voucher.amount', ['currency' => config('pw-config.currency_name')]) }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('voucher.add') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.donate.paypal') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('app.donate.paypal.submit') }}" onsubmit="return donation_check();" method="post">
            {!! csrf_field() !!}
            @if( config('pw-config.payment.paypal.double') )
                <div
                    class="flex flex-row z-0 mb-6 w-full group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span class="block sm:inline">{!! __('donate.double_notice') !!}</span>
                </div>
            @endif
            @if( config('pw-config.payment.paypal.sandbox') )
                <div
                    class="flex flex-row z-0 mb-6 w-full group bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span class="block sm:inline">{!! __('donate.sandboxActive') !!}</span>
                </div>
            @endif
            <div class="flex flex-row z-0 mb-6 w-full group">
                <span class="my-4 mx-4">{{ config('pw-config.payment.paypal.currency') }}</span>
                <x-hrace009::input-with-popover id="donation_dollars" name="dollars"
                                                type="number"
                                                placeholder=" "
                                                popover="{{ __('donate.paypal.amount') }}"
                />
                <span class="my-4 mx-4">=</span>
                <x-hrace009::input-with-popover id="donation_tokens" name="tokens"
                                                type="number"
                                                placeholder=" "
                                                popover="{{ __('donate.paypal.amount_receive', ['currency' => config('pw-config.currency_name')]) }}"
                />
                <span class="my-4 mx-4">{{ config('pw-config.currency_name') }}</span>
            </div>
            <div class="flex flex-row z-0 mb-6 gap-6 w-full group justify-between">
                <div
                    class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span
                        class="block sm:inline">{{ __('donate.ipaymu.minimum_desc') . ' : ' . config('pw-config.payment.paypal.currency') . ' ' . config('pw-config.payment.paypal.minimum') . ' / ' . config('pw-config.currency_name') . number_format((config('pw-config.payment.paypal.minimum') * config('pw-config.payment.paypal.currency_per')),0,'.','.') }}</span>
                </div>
                @if( config('pw-config.payment.paypal.bonusess') )
                    <div
                        class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                        role="alert"
                    >
                    <span
                        class="block sm:inline">{{ __('donate.paypal.frontbonus', ['vc' => config('pw-config.payment.paypal.bonusess'), 'currency' => config('pw-config.currency_name'), 'mingetbonus' => config('pw-config.payment.paypal.mingetbonus'), 'money' => config('pw-config.payment.paypal.currency')]) }}</span>
                    </div>
                @endif
                <div
                    class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span
                        class="block sm:inline">{{ __('donate.ipaymu.maximum_desc') . ' : ' . config('pw-config.payment.paypal.currency')  . ' ' . config('pw-config.payment.paypal.maximum') . ' / ' . config('pw-config.currency_name') . number_format((config('pw-config.payment.paypal.maximum') * config('pw-config.payment.paypal.currency_per')),0,'.','.') }}</span>
                </div>
            </div>
            <div class="flex flex-row z-0 mb-6 w-full group justify-center">
                <x-hrace009::button type="submit" class="w-1/2">
                    {{ __('shop.buy') }}
                </x-hrace009::button>
            </div>
        </form>
    </x-slot>
</x-hrace009.layouts.app>

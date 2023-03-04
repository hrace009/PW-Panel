@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.donate.ipaymu') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('app.donate.ipaymu.submit') }}" onsubmit="return donation_check();" method="post">
            {!! csrf_field() !!}
            @if( config('ipaymu.double') )
                <div
                    class="flex flex-row z-0 mb-6 w-full group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span class="block sm:inline">{!! __('donate.double_notice') !!}</span>
                </div>
            @endif
            @if( config('ipaymu.sandbox') )
                <div
                    class="flex flex-row z-0 mb-6 w-full group bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span class="block sm:inline">{!! __('donate.sandboxActive') !!}</span>
                </div>
            @endif
            <div class="flex flex-row z-0 mb-6 w-full group">
                <span class="my-4 mx-4"> IDR </span>
                <x-hrace009::input-with-popover id="donation_dollars" name="dollars"
                                                type="number"
                                                placeholder=" "
                                                popover="{{ __('donate.ipaymu.amount') }}"
                />
                <span class="my-4 mx-4">=</span>
                <x-hrace009::input-with-popover id="donation_tokens" name="tokens"
                                                type="number"
                                                placeholder=" "
                                                popover="{{ __('donate.ipaymu.amount_receive', ['currency' => config('pw-config.currency_name')]) }}"
                />
                <span class="my-4 mx-4">{{ config('pw-config.currency_name') }}</span>
            </div>
            <div class="flex flex-row z-0 mb-6 w-full group justify-between">
                <div
                    class="flex flex-row z-0 mb-6 w-auto group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span
                        class="block sm:inline">{{ __('donate.ipaymu.minimum_desc') . ' : ' . config('ipaymu.minimum') . ' ' . config('pw-config.currency_name') . ' / IDR.' . number_format((config('ipaymu.minimum') / config('ipaymu.currency_per')),0,'.','.') }}</span>
                </div>
                <div
                    class="flex flex-row z-0 mb-6 w-auto group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert"
                >
                    <span
                        class="block sm:inline">{{ __('donate.ipaymu.maximum_desc') . ' : ' . config('ipaymu.maximum') . ' ' . config('pw-config.currency_name') . ' / IDR.' . number_format((config('ipaymu.maximum') / config('ipaymu.currency_per')),0,'.','.') }}</span>
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

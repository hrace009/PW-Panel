@section('title', ' - ' . __('voucher.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.voucher') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h2 class="text-2xl font-semibold">{{ __('voucher.redem') }}</h2>
            </div>
            <div class="p-2 mt-2">
                <form action="{{ route('app.voucher.postRedem') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="code" name="code"
                                                        placeholder=" "
                                                        popover="{{ __('voucher.enter_code') }}"/>
                        <x-hrace009::label
                            for="code">{{ __('voucher.code') }}</x-hrace009::label>
                    </div>
                    <div class="flex flex-row z-0 mb-6 w-full group justify-center">
                        <x-hrace009::button type="submit" class="w-1/2">
                            {{ __('voucher.redem') }}
                        </x-hrace009::button>
                    </div>
                </form>
            </div>
        </div>
        @if ( count($voucher_logs->items()) > 0 )
            <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
                <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                    <h2 class="text-2xl font-semibold">{{ __('voucher.redem') }}</h2>
                </div>
                <div class="p-2 mt-2">
                    <div class="shadow overflow-hidden border dark:border-primary-darker sm:rounded-lg">
                        <table class="min-w-full text-xs font-medium">
                            <thead
                                class="dark:bg-darker dark:text-light border-b dark:border-primary-darker uppercase">
                            <tr>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('voucher.code') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('voucher.amount', ['currency' => config('pw-config.currency_name')]) }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider text-center">{{ __('voucher.redemed') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-transparent">
                            @foreach( $voucher_logs as $log )
                                <tr>
                                    <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker text-center border-r">
                                        {{ $log->voucher->code }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker text-center border-r">
                                        {{ $log->voucher->amount  }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap text-center">
                                        {{ \Carbon\Carbon::parse( $log->created_at)->translatedFormat('j F, Y h:i a') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 ml-2 mr-2 items-center justify-between">
                        @if( $voucher_logs->items() ?? '' )
                            {{ $voucher_logs->links() }}
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </x-slot>
</x-hrace009.layouts.app>

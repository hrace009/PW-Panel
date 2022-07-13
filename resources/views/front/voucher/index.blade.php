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
        {{ dd($voucher_logs) }}
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h2 class="text-2xl font-semibold">{{ __('voucher.redem') }}</h2>
            </div>
            <div class="p-2 mt-2">
                Logs Here
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.app>

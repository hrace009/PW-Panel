@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.donate.paymentwall') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h2 class="text-2xl font-semibold">{{ __('donate.guide.paymentwall.title', ['currency' => config('pw-config.currency_name')]) }}</h2>
            </div>
            <div class="p-2">
                <p class="text-sm">{{ __('donate.guide.paymentwall.text1', ['currency' => config('pw-config.currency_name')]) }}</p>
            </div>
        </div>
        <div class="flex flex-col items-center">
            {!! $widget !!}
        </div>
    </x-slot>
</x-hrace009.layouts.app>

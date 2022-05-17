@section('title', ' - ' . __('general.menu.dashboard'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.dashboard') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <x-hrace009::front.news-view/>
    </x-slot>
</x-hrace009.layouts.app>

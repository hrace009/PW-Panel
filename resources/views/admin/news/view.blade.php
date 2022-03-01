@section('title', ' - ' . __('admin.menu.news'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.news.view') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        Content View
    </x-slot>
</x-hrace009.layouts.admin>

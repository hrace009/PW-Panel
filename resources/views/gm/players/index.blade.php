@section('title', ' - ' . __('members.title'))
<x-hrace009.layouts.gamemaster>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('members.manage') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w mx-auto mt-2 ml-2 mr-2">
            <livewire:hrace009.admin.search-user/>
        </div>
    </x-slot>
</x-hrace009.layouts.gamemaster>

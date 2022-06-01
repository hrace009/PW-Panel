@section('title', ' - ' . __('members.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('members.manage') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <livewire:hrace009.admin.search-user/>
    </x-slot>
</x-hrace009.layouts.admin>

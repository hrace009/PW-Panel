@section('title', ' - ' . __('vote.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.vote') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div
            class="flex flex-col items-center text-center py-2 px-4 w-full bg-gray-200 border-gray-400 dark:bg-darker dark:border-primary border rounded">
            <span class="text-3xl">{{ __( 'vote.success.continue' ) }}</span>
            <span class="text-2xl">{!! __( 'vote.success.notice' ) !!}</span>
            <x-hrace009::button class="mt-4 w-3/4" onclick="window.open('{{ $vote->link}}', '_blank')">
                {{ __( 'vote.success.button' ) }}
            </x-hrace009::button>
        </div>
    </x-slot>
</x-hrace009.layouts.app>

@section('title', ' - ' . __('shop.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.shop') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w mx-6 my-6">
            <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
                <div class="col-span-3">
                    Shop Here
                </div>
                <div>
                    <x-hrace009::front.widget/>
                </div>
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.app>

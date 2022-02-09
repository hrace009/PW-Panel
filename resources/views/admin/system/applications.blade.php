@section('title', ' - ' . __('admin.menu.system'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.dashboard') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="grid grid-cols-2 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-3">
                <!-- News Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.news') }}
                    </h2>
                    <x-hrace009::check-box2 id="news-switch" name="news-switch"/>
                </div>

                <!-- Shop Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.shop') }}
                    </h2>
                    <x-hrace009::check-box2 id="shop-switch" name="shop-switch"/>
                </div>

                <!-- Donate Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.donate') }}
                    </h2>
                    <x-hrace009::check-box2 id="donate-switch" name="donate-switch"/>
                </div>

                <!-- Voucher Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.voucher') }}
                    </h2>
                    <x-hrace009::check-box2 id="voucher-switch" name="voucher-switch"/>
                </div>

                <!-- In Game Service Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.inGameService') }}
                    </h2>
                    <x-hrace009::check-box2 id="inGameService-switch" name="inGameService-switch"/>
                </div>

                <!-- Ranking Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.ranking') }}
                    </h2>
                    <x-hrace009::check-box2 id="ranking-switch" name="ranking-switch"/>
                </div>

                <!-- Vote Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.vote') }}
                    </h2>
                    <x-hrace009::check-box2 id="vote-switch" name="vote-switch"/>
                </div>

                <!-- Bank Transfer Switch -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <h2
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                    >
                        {{ __('admin.application.bank') }}
                    </h2>
                    <x-hrace009::check-box2 id="bank-switch" name="bank-switch"/>
                </div>

                <!-- Submit Button -->
                <x-hrace009::button>
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </div>
        </form>
    </x-slot>
</x-hrace009.layouts.admin>

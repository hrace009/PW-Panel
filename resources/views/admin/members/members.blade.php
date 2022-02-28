@section('title', ' - ' . __('admin.menu.members'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.menu.manage') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="flex flex-col pl-6 pr-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle min-w-full inline-block sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border dark:border-primary-darker sm:rounded-lg">
                        <div
                            class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700">
                            <span class="absolute inset-y-0 inline-flex items-center px-4">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <form method="get" action="{{ route('admin.manage.search') }}">
                                <input id="searchInput" name="searchInput" x-ref="searchInput" type="text"
                                       class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-darker dark:border-transparent dark:text-light focus:outline-none focus:ring"
                                       placeholder="Search...">
                                <x-hrace009::admin.validation-error/>
                            </form>
                        </div>

                        <table class="min-w-full">
                            <thead class="dark:bg-darker dark:text-light border-b dark:border-primary-darker">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r dark:border-primary-darker">{{ __('admin.members.id') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r dark:border-primary-darker">{{ __('admin.members.name') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r dark:border-primary-darker">{{ __('admin.members.truename') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r dark:border-primary-darker">{{ __('admin.members.balance') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r dark:border-primary-darker">{{ __('admin.members.role') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('admin.members.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-transparent">
                            @if( $users ?? '' )
                                @foreach( $users as $user )
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->ID }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ ucwords($user->truename) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->money }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if( $user->role === 'Administrator' )
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $user->role }}</span>
                                            @elseif ( $user->role === 'Gamemaster')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $user->role }}</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $user->role }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Modal -->
                                            <div x-data="{ {{ $user->name }}_Modal : false }">
                                                <!-- Button -->
                                                <x-hrace009::button
                                                    @click="{{ $user->name }}_Modal = !{{ $user->name }}_Modal"
                                                    class="w-auto"
                                                >
                                                    {{ __('Give ') . config('pw-config.currency_name') }}
                                                </x-hrace009::button>
                                                <!-- Modal Background -->
                                                <div
                                                    x-show="{{ $user->name }}_Modal"
                                                    class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    style="display: none;"
                                                >
                                                    <!-- Modal -->
                                                    <div
                                                        x-show="{{ $user->name }}_Modal"
                                                        class="dark:bg-dark rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                        @click.away="{{ $user->name }}_Modal = false"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        style="display: none;"
                                                    >
                                                        <div class="text-lg font-semibold">
                                                            {{ __('admin.members.give') . ' ' . config('pw-config.currency_name') . ': ' . __('admin.pagination.to') . ' ' . $user->name }}
                                                        </div>
                                                        <form action="{{ route('admin.manage.balance', $user->ID ) }}"
                                                              method="post">
                                                            {!! csrf_field() !!}
                                                            <div class="mt-4">
                                                                <x-hrace009::input-box id="amount" name="amount"
                                                                                       placeholder="{{ __('admin.members.amount') }}"
                                                                                       required/>
                                                            </div>
                                                            <div
                                                                class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                                <x-hrace009::button class="w-auto">
                                                                    {{ __('admin.members.give') . ' ' . config('pw-config.currency_name') }}
                                                                </x-hrace009::button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            @if( $searchUsers ?? '' )
                                @foreach( $searchUsers as $searchUser )
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $searchUser->ID }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $searchUser->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ ucwords($searchUser->truename) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $searchUser->money }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if( $searchUser->role === 'Administrator' )
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $searchUser->role }}</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $searchUser->role }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Modal -->
                                            <div x-data="{ {{ $searchUser->name }}_Modal : false }">
                                                <!-- Button -->
                                                <x-hrace009::button
                                                    @click="{{ $searchUser->name }}_Modal = !{{ $searchUser->name }}_Modal"
                                                    class="w-auto"
                                                >
                                                    {{ __('Give ') . config('pw-config.currency_name') }}
                                                </x-hrace009::button>
                                                <!-- Modal Background -->
                                                <div
                                                    x-show="{{ $searchUser->name }}_Modal"
                                                    class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    style="display: none;"
                                                >
                                                    <!-- Modal -->
                                                    <div
                                                        x-show="{{ $searchUser->name }}_Modal"
                                                        class="dark:bg-dark rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                        @click.away="{{ $searchUser->name }}_Modal = false"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        style="display: none;"
                                                    >
                                                        <div class="text-lg font-semibold">
                                                            {{ __('admin.members.give') . ' ' . config('pw-config.currency_name') . ': ' . __('admin.pagination.to') . ' ' . $searchUser->name }}
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.manage.balance', $searchUser->ID ) }}"
                                                            method="post">
                                                            {!! csrf_field() !!}
                                                            <div class="mt-4">
                                                                <x-hrace009::input-box id="amount" name="amount"
                                                                                       placeholder="{{ __('admin.members.amount') }}"
                                                                                       required/>
                                                            </div>
                                                            <div
                                                                class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                                <x-hrace009::button class="w-auto">
                                                                    {{ __('admin.members.give') . ' ' . config('pw-config.currency_name') }}
                                                                </x-hrace009::button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                @if( $users ?? '' )
                    {{ $users->links() }}
                @endif
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

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
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#{{ $user->name }}_givemoney"
                                               class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">{{ __('Give') . ' ' . config('pw-config.currency_name')}}</a>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#{{ $searchUser->name }}_balance"
                                               class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">{{ __('Give') . ' ' . config('pw-config.currency_name') }}</a>
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


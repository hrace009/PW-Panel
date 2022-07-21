@section('title', ' - ' . __('ranking.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.ranking.faction') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="mx-auto rounded max-w-3xl xl:-mx-4 px-4">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start mb-4">
                <div class="hidden sm:block bg-gray-200 dark:bg-darker p-2 rounded">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('app.ranking.faction', 'level') }}"
                           class="{{ (request()->is('*/level') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.level') }}</a>

                        <a href="{{ route('app.ranking.faction', 'members') }}"
                           class="{{ (request()->is('*/members') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.members') }}</a>

                        <a href="{{ route('app.ranking.faction', 'territories') }}"
                           class="{{ (request()->is('*/territories') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.territories') }}</a>

                        <a href="{{ route('app.ranking.faction', 'pvp') }}"
                           class="{{ (request()->is('*/pvp') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.pvp') }}</a>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                <table class="w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">{{ __('ranking.name') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('ranking.leader') }}</th>
                        <th class="py-3 px-6 text-left">{{ __( 'ranking.type.' . Request::segment( 4 ) ) }}</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs dark:text-light">

                    @foreach( $ranks as $rank )
                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ ($ranks->currentPage() - 1)  * $ranks->links()->paginator->perPage() + $loop->iteration }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $rank->name }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $rank->master_name }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if ( Request::is( '*/level' ) )
                                        {{ $rank->level }}
                                    @elseif ( Request::is( '*/members' ) )
                                        {{ number_format( $rank->members ) }}
                                    @elseif ( Request::is( '*/territories' ) )
                                        {{ number_format($rank->territories) }}
                                    @elseif ( Request::is( '*/pvp' ) )
                                        {{ $rank->pk_count }}
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if( $ranks->items() )
                {{ $ranks->render() }}
            @endif
        </div>
    </x-slot>
</x-hrace009.layouts.app>

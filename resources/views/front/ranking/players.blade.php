@section('title', ' - ' . __('ranking.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.ranking.players') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="mx-auto rounded max-w-3xl xl:-mx-4 px-4">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start mb-4">
                <div class="hidden sm:block bg-gray-200 dark:bg-darker p-2 rounded">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('app.ranking.player', 'level') }}"
                           class="{{ (request()->is('*/level') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.level') }}</a>

                        <a href="{{ route('app.ranking.player', 'rep') }}"
                           class="{{ (request()->is('*/rep') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.rep') }}</a>

                        <a href="{{ route('app.ranking.player', 'time') }}"
                           class="{{ (request()->is('*/time') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.time') }}</a>

                        <a href="{{ route('app.ranking.player', 'pvp') }}"
                           class="{{ (request()->is('*/pvp') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.pvp') }}</a>
                        <a href="{{ route('app.ranking.player', 'pariah_time') }}"
                           class="{{ (request()->is('*/pariah_time') ) ? 'bg-gray-900 dark:bg-primary text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white dark:hover:bg-primary' }} px-3 py-2 rounded-md text-sm font-medium">{{ __('ranking.type.pariah_time') }}</a>
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
                        <th class="py-3 px-6 text-left">{{ __('ranking.class') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('ranking.gender.caption') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('ranking.spouse.caption') }}</th>
                        <th class="py-3 px-6 text-left">{{ __( 'ranking.type.' . Request::segment( 4 ) ) }}</th>
                        <th class="py-3 px-6 text-left">{{ __('ranking.guild') }}</th>
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
                                    <span @popper({{ __( 'general.classes.' . $rank->cls ) }})
                                          class="class s-16 c{{ $rank->cls }}"></span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span @popper({{ __('ranking.gender.' . $rank->gender ) }})><img
                                            src="/img/gender/{{ $rank->gender }}.png"></span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if( $rank->spouse )
                                        @if( !$players->getPlayer($rank->spouse) )
                                            {{ __('ranking.spouse.4everalone') }}
                                        @else
                                            {{ $players->getPlayer($rank->spouse)->name }}
                                        @endif
                                    @else
                                        {{ __('ranking.spouse.4everalone') }}
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if ( Request::is( '*/level' ) )
                                        {{ $rank->level }}
                                    @elseif ( Request::is( '*/rep' ) )
                                        {{ number_format( $rank->reputation ) }}
                                    @elseif ( Request::is( '*/time' ) )
                                        {{ $timeMaker->makeTime($rank->time_used) }}
                                    @elseif ( Request::is( '*/pvp' ) )
                                        {{ $rank->pk_count }}
                                    @elseif ( Request::is( '*/pariah_time' ) )
                                        {{ $timeMaker->makeTime($rank->pariah_time) }}
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ ( $rank->faction_name ) ? $rank->faction_name : '-' }}
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

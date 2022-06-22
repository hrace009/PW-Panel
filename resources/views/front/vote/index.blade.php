@section('title', ' - ' . __('vote.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.vote') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        @if( count( $sites ) === 0 )
            <div
                class="flex flex-row z-0 p-4 my-4  w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded"
                role="alert"
            >
                <span class="block sm:inline">{!! __('vote.no_sites') !!}</span>
            </div>
        @else
            @foreach( $sites as $site )
                <div class="my-4">
                    <div
                        class="flex flex-row justify-between py-2 px-4 w-full bg-gray-200 border-gray-400 dark:bg-darker dark:border-primary border rounded rounded-b-none">
                        <span class="dark:text-primary-light">{{ $site->name }}</span>
                        <span
                            class="flex flex-row px-3 py-1 justify-between items-center text-sm font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer {{ $site->color($site->type) }}">{{ $site->type === 'cubi' ? __('vote.create.type_cubi') : __('vote.create.type_virtual', ['currency' => config('pw-config.currency_name')]) }}
                        </span>
                    </div>
                    <div
                        class="flex flex-row justify-center p-4 w-full bg-gray-200 border-gray-400 dark:bg-darker dark:border-primary border-l border-r border-b rounded-b">
                        @if( $vote_info[ $site->id ]['status'] )
                            <form action="{{ route('app.vote.check', $site->id )  }}" method="post">
                                {{ csrf_field() }}
                                <x-hrace009::button type="submit">
                                    {{ __('vote.button', [ 'name' => $site->name ]) }}
                                </x-hrace009::button>
                            </form>
                        @else
                            <div class="text-center">
                                <span>{{ __('vote.cooldown') }}</span>
                                <div data-countdown="{{ $vote_info[ $site->id ]['end_time'] }}"></div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </x-slot>
</x-hrace009.layouts.app>

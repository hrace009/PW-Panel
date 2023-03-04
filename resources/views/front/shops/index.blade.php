@section('title', ' - ' . __('shop.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.shop') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        @if( $items->count() > 0 )
            <div class="flex flex-wrap">
                @foreach( $items as $item )
                    <div class="w-full md:w-1/2 p-2">
                        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg ">
                            <div class="bg-gray-400 h-64 rounded-t-lg p-4 bg-no-repeat bg-center bg-cover"
                                 style="background-image: url({{ asset('uploads/shops/image') . '/' . $item->image }})">
                                <div class="flex flex-row justify-center justify-between">
                                    <div class="text-left">
                                        <img width="32"
                                             src="{{ url( asset('uploads/shops/icon') . '/' . $item->icon ) }}"
                                             alt="{{ $item->name }}"/>
                                    </div>
                                    <div class="text-right">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer {{ __(Arr::get($item->maskType($item->mask), 'color')) }}">{{ __(Arr::get($item->maskType($item->mask), 'category')) . ' > ' . __(Arr::get($item->maskType($item->mask), 'item')) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-start px-2 pt-2">
                                <div class="p-2 flex-1">
                                    <h1 class="font-extrabold text-xl font-poppins dark:text-cyan-400">{{ $item->name }}</h1>
                                    <p class="text-gray-500 font-nunito">{!! $item->description !!}</p>
                                </div>
                                <div class="p-0 text-right">
                                    @if( $item->poin != 0)
                                        <div
                                            class="dark:text-light font-semibold text-lg font-poppins">{{ number_format( $item->poin, 0, ',', '.') }}
                                            <span class="text-xs">{{ __('vote.create.type_bonusess') }}</span></div>
                                    @endif
                                    @if( $item->price != 0)
                                        <div
                                            class="dark:text-light font-semibold text-lg font-poppins">{{ number_format( $item->price - ( ( $item->price / 100 ) * $item->discount ), 0, ',', '.') }}
                                            <span class="text-xs">{{ config('pw-config.currency_name') }}</span></div>
                                    @endif
                                    @if( $item->discount != 0 )
                                        <div
                                            class="dark:text-light line-through font-semibold text-sm font-poppins">{{ $item->price }}
                                            <span class="text-xs">{{ config('pw-config.currency_name') }}</span></div>
                                        <div
                                            class="dark:text-light font-semibold text-xs font-poppins">{{ __('shop.fields.discount') . ' ' . $item->discount }}
                                            %
                                        </div>
                                    @endif
                                    <div
                                        class="dark:text-light font-semibold text-xs font-poppins">
                                        {{ __('shop.fields.shareable.title') }}
                                        : {{ $item->shareable ? __('shop.fields.shareable.yes') : __('shop.fields.shareable.no') }}
                                    </div>
                                    <div
                                        class="dark:text-light font-semibold text-xs font-poppins">
                                        {{ __('shop.times_bought') }}
                                        : {{ $item->times_bought }}
                                    </div>
                                </div>
                            </div>
                            @if( Auth::user()->characterId() )
                                @if( $item->price != 0 )
                                    <div class="flex justify-center items-center px-2 pb-2">
                                        <div class="w-1/2 p-2">
                                            <form action="{{ route( 'app.shop.purchase.post', $item->id ) }}"
                                                  method="post">
                                                @method('POST')
                                                {!! csrf_field() !!}
                                                <x-hrace009::button
                                                    class="mr-2"
                                                    type="submit">{{ __('shop.buy') . ' (' . number_format( $item->price - ( ( $item->price / 100 ) * $item->discount ), 0, ',', '.') . ' ' . config('pw-config.currency_name') . ')' }}</x-hrace009::button>
                                            </form>
                                        </div>
                                        @if ( $item->shareable )
                                            <div class="w-1/2 p-2">
                                                <div x-data="{ gift_{{ $item->id }} : false }">
                                                    <!-- Button View -->
                                                    <x-hrace009::button
                                                        @click="gift_{{ $item->id }} = !gift_{{ $item->id }}"
                                                        class="ml-1"
                                                    >
                                                        {{ __('shop.gift') . ' (' . number_format( $item->price - ( ( $item->price / 100 ) * $item->discount ), 0, ',', '.') . ' ' . config('pw-config.currency_name') . ')' }}
                                                    </x-hrace009::button>

                                                    <!-- Modal View News -->
                                                    <div
                                                        x-show="gift_{{ $item->id }}"
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
                                                            x-show="gift_{{ $item->id }}"
                                                            class="bg-white dark:bg-dark rounded shadow p-6 w-auto mx-10"
                                                            @click.away="gift_{{ $item->id }} = false"
                                                            x-transition:enter="ease-out duration-300"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="ease-in duration-200"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            style="display: none;"
                                                        >
                                                            <div class="text-xl font-bold">
                                                                {{ __('shop.listFriend', ['character' => Auth::user()->characterName() ]) }}
                                                            </div>
                                                            <div class="text-lg my-2 ">
                                                                @if( ! $friends )
                                                                    <p class="text-xl dark:text-cyan-400 font-bold">{{ __('shop.no_friends') }}</p>
                                                                @else
                                                                    <p class="text-xl dark:text-cyan-400 font-bold">{{ __('shop.recently_added_friends') }}</p>
                                                                    <form method="post"
                                                                          action="{{ route('app.shop.gift.post', $item->id ) }}">
                                                                        @method('POST')
                                                                        {!! csrf_field() !!}
                                                                        <div
                                                                            class="grid grid-cols-2 gap-1 lg:grid-cols-2 xl:grid-cols-4">
                                                                            @foreach( $friends as $friend )
                                                                                @foreach( $friend as $key => $value )
                                                                                    <div id="{{ $value['rid'] }}"
                                                                                         class="flex my-2">
                                                                                        <div
                                                                                            class="pretty p-default p-thick p-curve p-smooth">
                                                                                            <input type="checkbox"
                                                                                                   id="{{ $value['rid'] }}"
                                                                                                   name="friends[]"
                                                                                                   value="{{ $value['rid'] }}"
                                                                                            />
                                                                                            <div class="state p-info">
                                                                                                <label
                                                                                                    for="{{ $value['rid'] }}">{{ $value['name'] }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="flex flex-col">
                                                                            <div class="w-auto mt-2">
                                                                                <x-hrace009::button
                                                                                    type="submit">{{ __('shop.send_gift') }}</x-hrace009::button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                @if( $item->poin != 0 )
                                    <div class="flex justify-center items-center px-2 pb-2">
                                        <div class="w-1/2 p-2">
                                            <form action="{{ route( 'app.shop.point.post', $item->id ) }}"
                                                  method="post">
                                                @method('POST')
                                                {!! csrf_field() !!}
                                                <x-hrace009::button
                                                    class="mr-2"
                                                    type="submit">{{ __('shop.buy') . ' (' . number_format( $item->poin , 0, ',', '.') . ' ' . __('vote.create.type_bonusess') . ')' }}</x-hrace009::button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="flex justify-center items-center px-2 pb-2">
                                    {{ __('general.character.error.not_selected') }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __('shop.empty.noItem') }}</strong>
                <span class="block sm:inline">{{ __('shop.empty.pleaseSell') }}</span>
            </div>
        @endif
        {{ $items->render() }}
    </x-slot>
</x-hrace009.layouts.app>

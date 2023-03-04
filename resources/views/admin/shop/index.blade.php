@section('title', ' - ' . __('shop.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('shop.view') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="mt-2 ml-2 mr-2">
            @if( !$shops->items() )
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ __('shop.empty.noItem') }}</strong>
                    <span class="block sm:inline">{{ __('shop.empty.pleaseSell') }}</span>
                </div>
            @else
                <div class="flex flex-wrap">
                    @foreach( $shops as $item )
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
                                    <div class="p-2 flex-grow">
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
                                                <span class="text-xs">{{ config('pw-config.currency_name') }}</span>
                                            </div>
                                        @endif
                                        @if( $item->discount != 0 )
                                            <div
                                                class="dark:text-light line-through font-semibold text-sm font-poppins">{{ $item->price }}
                                                <span class="text-xs">{{ config('pw-config.currency_name') }}</span>
                                            </div>
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
                                    </div>
                                </div>
                                <div class="flex justify-center items-center px-2 pb-2">
                                    <div class="w-1/2 p-2">
                                        <x-hrace009::button
                                            onclick="window.location.href='{{ route('shop.edit',$item->id ) }}'"
                                            class="mr-2">{{ __('shop.edit') }}</x-hrace009::button>
                                    </div>
                                    <div class="w-1/2 p-2">
                                        <form action="{{ route('shop.destroy', $item->id )}}" method="post">
                                            {!! csrf_field() !!}
                                            @method('DELETE')
                                            <x-hrace009::button
                                                type="submit">{{ __('shop.delete') }}</x-hrace009::button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{ $shops->links() }}
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

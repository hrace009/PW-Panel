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
                                <div class="text-right">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer {{ __(Arr::get($item->maskType($item->mask), 'color')) }}">{{ __(Arr::get($item->maskType($item->mask), 'category')) . ' > ' . __(Arr::get($item->maskType($item->mask), 'item')) }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-start px-2 pt-2">
                                <div class="p-2 flex-grow">
                                    <h1 class="font-extrabold text-xl font-poppins dark:text-cyan-400">{{ $item->name }}</h1>
                                    <p class="text-gray-500 font-nunito">{!! $item->description !!}</p>
                                </div>
                                <div class="p-0 text-right">
                                    <div
                                        class="dark:text-light font-semibold text-lg font-poppins">{{ number_format( $item->price - ( ( $item->price / 100 ) * $item->discount ), 0, ',', '.') }}
                                        <span class="text-xs">{{ config('pw-config.currency_name') }}</span></div>
                                    <div
                                        class="dark:text-light line-through font-semibold text-sm font-poppins">{{ $item->price }}
                                        <span class="text-xs">{{ config('pw-config.currency_name') }}</span></div>
                                    <div
                                        class="dark:text-light font-semibold text-xs font-poppins">{{ __('shop.fields.discount') . ' ' . $item->discount }}
                                        %
                                    </div>
                                    <div
                                        class="dark:text-light font-semibold text-xs font-poppins">
                                        {{ __('shop.fields.shareable.title') }}
                                        : {{ $item->shareable ? __('shop.fields.shareable.yes') : __('shop.fields.shareable.no') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center items-center px-2 pb-2">
                                <div class="w-1/2 p-2">
                                    <form action="{{ route( 'app.shop.purchase.post', $item->id ) }}" method="post">
                                        @method('POST')
                                        {!! csrf_field() !!}
                                        <x-hrace009::button
                                            class="mr-2"
                                            type="submit">{{ __('shop.buy') }}</x-hrace009::button>
                                    </form>
                                </div>
                                <div class="w-1/2 p-2">
                                    Gift Button Here
                                </div>
                            </div>
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

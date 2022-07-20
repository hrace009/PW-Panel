@section('title', ' - ' . __('service.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.services') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <x-hrace009::validation-errors/>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            @foreach( $services as $service )
                @if ( $service->enabled )
                    <form action="{{ route('app.services.post', $service->key ) }}" method="post">
                        {!! csrf_field() !!}
                        <div
                            class="flex flex-col dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light h-full">
                            <div
                                class="flex flex-row p-2 align-middle align-center dark:text-primary-light border-b dark:border-primary-light">
                                <svg
                                    class="w-11 h-11 pr-2"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.3"
                                        d="{{ $service->icon }}"
                                    />
                                </svg>
                                <div class="flex flex-col">
                                    <h2 class="font-extrabold">
                                        {{ __('service.ingame.' . $service->key . '.title') }}
                                    </h2>
                                    @if( $service->price > 0 )
                                        <span class="text-sm">
                                    {{ __('service.price') . ': ' . number_format( $service->price ) }} {{ ( $service->currency_type === 'virtual' ) ? config('pw-config.currency_name') : __('service.ingame_gold') }}
                                    </span>
                                    @else
                                        <span
                                            class="text-sm">{{ __('service.price') . ': ' . __('service.free') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="p-2 mt-2 text-sm">
                                <span>{{ __('service.ingame.' . $service->key . '.description') }}</span>
                                <span>{{ __('service.requirements') }}</span>
                                <ul class="list-disc ml-6">
                                    @foreach( __('service.ingame.' . $service->key . '.requirements') as $requirement )
                                        <li>
                                            <span>{{ __( 'service.' . $requirement ) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if( is_array( __('service.ingame.' . $service->key . '.input') ) )
                                <div class="p-2">
                                    <x-hrace009::input
                                        name="{{ __( 'service.ingame.' . $service->key . '.input')['name'] }}"
                                        type="{{ __( 'service.ingame.' . $service->key . '.input')['type'] }}"
                                        placeholder="{{ __('service.' . __( 'service.ingame.' . $service->key . '.input')['placeholder']) }}"
                                    />
                                </div>
                                <div class="mt-auto items-center justify-between p-2">
                                    <x-hrace009::button>
                                        {{ __('general.buy') }}
                                    </x-hrace009::button>
                                </div>
                            @else
                                <div class="mt-auto items-center justify-between p-2">
                                    <x-hrace009::button>
                                        {{ __('general.buy') }}
                                    </x-hrace009::button>
                                </div>
                            @endif
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </x-slot>
</x-hrace009.layouts.app>

@section('title', ' - ' . __('service.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('service.view') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form action="{{ route('service.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="grid grid-cols-2 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                    @foreach( $services as $service )
                        <div class="flex-col p-4 bg-white rounded-md dark:bg-darker">
                            <h1
                                class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                            >
                                {{ __('service.label.' . $service->key) }}
                            </h1>
                            <x-hrace009::divider/>
                            <div class="flex mt-4 align-middle items-center">
                                <label
                                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light mr-2">
                                    {{ $service->enabled ? __('service.enable') : __('service.disable') }}
                                </label>
                                <label class="flex items-center">
                                    <div class="relative inline-flex items-center">
                                        <input
                                            id="{{ $service->key . '_enabled' }}"
                                            name="{{ $service->key . '_enabled'}}"
                                            value="{{ $service->enabled }}"
                                            @if( $service->enabled ) checked @endif
                                            type="checkbox"
                                            class="w-12 h-5 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                                        />
                                        <span
                                            @popper({{ __('service.desc.' . $service->key ) }})
                                            class="absolute top-0 left-0 w-5 h-5 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                                        ></span>
                                    </div>
                                </label>
                            </div>
                            <div class="flex mt-4 align-middle items-center">
                                <label for="{{ $service->key . '_price' }}"
                                       class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light mr-2">
                                    {{ __('service.price')  }}
                                </label>
                                <x-hrace009::input-box id="{{ $service->key . '_price' }}"
                                                       name="{{ $service->key . '_price' }}"
                                                       value="{{ $service->price }}"/>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="gap-8 p-4">
                    <!-- Submit Button -->
                    <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                        {{ __('general.Save') }}
                    </x-hrace009::button-with-popover>
                </div>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

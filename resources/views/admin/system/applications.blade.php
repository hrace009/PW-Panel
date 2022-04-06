@section('title', ' - ' . __('system.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('system.apps') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <form method="post" action="{{ route('admin.application.post') }}">
            {!! csrf_field() !!}
            <div class="grid grid-cols-2 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                @foreach( $apps as $app => $value )
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <h2
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                        >
                            {{ __('system.application.' . $app ) }}
                        </h2>
                        <label class="flex items-center">
                            <div class="relative inline-flex items-center">
                                <input
                                    id="{{ $app }}"
                                    name="{{ $app }}"
                                    value="{{ $value }}"
                                    @if( $value ) checked @endif
                                    type="checkbox"
                                    class="w-12 h-5 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                                />
                                <span
                                    @popper({{ __('system.application_desc.' . $app ) }})
                                    class="absolute top-0 left-0 w-5 h-5 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                                ></span>
                            </div>
                        </label>
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
    </x-slot>
</x-hrace009.layouts.admin>

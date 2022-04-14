@section('title', ' - ' . __('service.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('service.config') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <h2 class="mb-6">{{ __('service.teleport_character') }}</h2>
            <x-hrace009::admin.validation-error/>
            <form action="{{ route('admin.service.updateSettings') }}" method="post">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="teleport_world_tag" name="teleport_world_tag"
                                       value="{{ config('pw-config.teleport_world_tag') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label
                        for="teleport_world_tag">{{ __('service.teleport_world_tag') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="teleport_x" name="teleport_x"
                                       value="{{ config('pw-config.teleport_x') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="teleport_x">{{ __('service.teleport_x') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="teleport_y" name="teleport_y"
                                       value="{{ config('pw-config.teleport_y') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="teleport_y">{{ __('service.teleport_y') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="teleport_z" name="teleport_z"
                                       value="{{ config('pw-config.teleport_z') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="teleport_z">{{ __('service.teleport_z') }}</x-hrace009::label>
                </div>
                <h2 class="mb-6">{{ __('service.level_up') }}</h2>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="level_up_cap" name="level_up_cap"
                                       value="{{ config('pw-config.level_up_cap') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="level_up_cap">{{ __('service.level_up_cap') }}</x-hrace009::label>
                </div>
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

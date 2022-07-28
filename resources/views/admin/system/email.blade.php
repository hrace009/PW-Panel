@section('title', ' - ' . __('system.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('system.email_config') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-sm mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="/">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="server_name" name="server_name"
                                                    value="{{ config('pw-config.server_name') }}"
                                                    placeholder=" " required :popover="__('system.server_name_desc')"/>
                    <x-hrace009::label for="server_name">{{ __('system.server_name') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

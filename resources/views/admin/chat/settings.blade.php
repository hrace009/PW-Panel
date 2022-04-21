@section('title', ' - ' . __('chat.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('chat.config') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.chat.postSettings') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="log_path" name="log_path"
                                                    placeholder=" "
                                                    :popover="__('manage.fields.chat.path_desc')"
                                                    value="{{ config('pw-config.chat_log_path') }}"
                    />
                    <x-hrace009::label for="log_path">{{ __('manage.fields.chat.path') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

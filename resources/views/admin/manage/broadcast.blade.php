@section('title', ' - ' . __('manage.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('manage.broadcast') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.ingamemanage.postBroadcast') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="user" name="user"
                                                    placeholder=" " :popover="__('manage.fields.broadcast.user_desc')"/>
                    <x-hrace009::label for="user">{{ __('manage.fields.broadcast.user') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover id="channel" name="channel"
                                                     :popover="__('manage.fields.broadcast.channel_desc')">
                        @foreach( __('manage.channels') as $cahnnel => $caption )
                            <option class="dark:text-gray-500" value="{{ $cahnnel }}">
                                {{ $caption }}
                            </option>
                        @endforeach
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="channel">{{ __('manage.fields.broadcast.channel') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="message" name="message"
                                                    placeholder=" "
                                                    :popover="__('manage.fields.broadcast.message_desc')"
                    />
                    <x-hrace009::label for="message">{{ __('manage.fields.broadcast.message') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('manage.submit.broadcast') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

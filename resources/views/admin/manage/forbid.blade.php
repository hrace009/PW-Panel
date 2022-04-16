@section('title', ' - ' . __('manage.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('manage.forbid') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.ingamemanage.postForbid') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="type" name="type">
                        @foreach( __('manage.fields.forbid.types') as $type => $caption )
                            <option class="dark:text-gray-500" value="{{ $type }}">
                                {{ $caption }}
                            </option>
                        @endforeach
                    </x-hrace009::select>
                    <x-hrace009::label for="type">{{ __('manage.fields.forbid.type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="user_id" name="user_id"
                                                    placeholder=" " :popover="__('manage.fields.forbid.user_id_desc')"/>
                    <x-hrace009::label for="user_id">{{ __('manage.fields.forbid.user_id') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="length" name="length"
                                                    placeholder=" " :popover="__('manage.fields.forbid.length_desc')"/>
                    <x-hrace009::label for="length">{{ __('manage.fields.forbid.length') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="reason" name="reason"
                                                    placeholder=" " :popover="__('manage.fields.forbid.reason_desc')"/>
                    <x-hrace009::label for="reason">{{ __('manage.fields.forbid.reason') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('manage.submit.forbid') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

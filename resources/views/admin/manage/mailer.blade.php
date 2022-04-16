@section('title', ' - ' . __('manage.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('manage.mailer') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.ingamemanage.postMailer') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="type" name="type">
                        @foreach( __('manage.fields.mailer.types') as $type => $caption )
                            <option class="dark:text-gray-500" value="{{ $type }}">
                                {{ $caption }}
                            </option>
                        @endforeach
                    </x-hrace009::select>
                    <x-hrace009::label for="type">{{ __('manage.fields.mailer.type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="roles" name="roles"
                                                    placeholder=" " :popover="__('manage.fields.mailer.roles_desc')"/>
                    <x-hrace009::label for="roles">{{ __('manage.fields.mailer.roles') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="item_id" name="item_id"
                                                    placeholder=" " :popover="__('manage.fields.mailer.item_id')"/>
                    <x-hrace009::label for="item_id">{{ __('manage.fields.mailer.item_id') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="quantity" name="quantity"
                                                    placeholder=" " :popover="__('manage.fields.mailer.quantity')"/>
                    <x-hrace009::label for="quantity">{{ __('manage.fields.mailer.quantity') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="protection_type" name="protection_type"
                                                    placeholder=" "
                                                    :popover="__('manage.fields.mailer.protection_type')"/>
                    <x-hrace009::label
                        for="protection_type">{{ __('manage.fields.mailer.protection_type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="time_limit" name="time_limit"
                                                    placeholder=" " :popover="__('manage.fields.mailer.time_limit')"/>
                    <x-hrace009::label for="time_limit">{{ __('manage.fields.mailer.time_limit') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="octet" name="octet"
                                                    placeholder=" " :popover="__('manage.fields.mailer.octet')"/>
                    <x-hrace009::label for="octet">{{ __('manage.fields.mailer.octet') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="mask" name="mask">
                        @foreach( $masks as $group => $mask )
                            @if( is_array( $mask ) )
                                <optgroup class="dark:text-gray-500" label="{{ $group }}">
                                    @foreach( $mask as $item => $value )
                                        <option class="dark:text-gray-500"
                                                value="{{ $item }}"> {{ $value }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option class="dark:text-gray-500"
                                        value="{{ $group }}"> {{ $mask }}
                                </option>
                            @endif
                        @endforeach
                    </x-hrace009::select>
                    <x-hrace009::label for="type">{{ __('manage.fields.mailer.mask') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="gold" name="gold"
                                                    placeholder=" " :popover="__('manage.fields.mailer.gold')"/>
                    <x-hrace009::label for="gold">{{ __('manage.fields.mailer.gold') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="subject" name="subject"
                                                    placeholder=" " :popover="__('manage.fields.mailer.subject')"/>
                    <x-hrace009::label for="subject">{{ __('manage.fields.mailer.subject') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea
                        id="message"
                        name="message"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                    >

                    </textarea>
                    <x-hrace009::label for="message">{{ __('manage.fields.mailer.message') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('manage.submit.mailer') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

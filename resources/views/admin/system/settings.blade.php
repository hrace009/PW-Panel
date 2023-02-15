@section('title', ' - ' . __('system.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('system.configuration') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-sm mx-auto mt-6 rounded-md dark:bg-darker bg-white p-4">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.settings.post') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <img id="current_logo" src="
                    @if( config('pw-config.logo') === 'img/logo/logo.png' )
                        {{ asset(config('pw-config.logo')) }}
                        @elseif( ! config('pw-config.logo') )
                        {{ asset( 'img/logo/logo.png' ) }}
                        @else
                        {{ asset('uploads/logo/' . config('pw-config.logo') ) }}
                    @endif
                    "
                     alt="{{ config('pw-config.server_name') }}" width="128" height="128"/>
                    <x-hrace009::label for="current_logo">{{ __('system.current_logo') }}</x-hrace009::label>
                    <span class="text-sm text-gray-500 dark:text-cyan-400">{{ __('system.logo_note') }}</span>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{ __('system.logo_desc') }}" id="logo" name="logo"
                                                    type="file"/>
                    <x-hrace009::label for="logo">{{ __('system.logo') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="server_name" name="server_name"
                                                    value="{{ config('pw-config.server_name') }}"
                                                    placeholder=" " required :popover="__('system.server_name_desc')"/>
                    <x-hrace009::label for="server_name">{{ __('system.server_name') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="currency_name" name="currency_name"
                                                    value="{{ config('pw-config.currency_name') }}" placeholder=" "
                                                    required
                                                    :popover="__('system.currency_name_desc')"
                    />
                    <x-hrace009::label for="currency_name">{{ __('system.currency_name') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="gmwa" name="gmwa"
                                                    value="{{ config('pw-config.gmwa') }}" placeholder=" "
                                                    required
                                                    :popover="__('system.gmwa')"
                    />
                    <x-hrace009::label for="gmwa">{{ __('system.gmwa') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="fakeonline" name="fakeonline"
                                                    value="{{ config('pw-config.fakeonline') }}" placeholder=" "
                                                    required
                                                    :popover="__('system.fakeonline_desc')"
                    />
                    <x-hrace009::label for="gmwa">{{ __('system.fakeonline') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="server_ip" name="server_ip"
                                                    value="{{ config('pw-config.server_ip') }}"
                                                    placeholder=" " required :popover="__('system.server_ip_desc')"/>
                    <x-hrace009::label for="server_ip">{{ __('system.server_ip') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover id="server_version" name="server_version" required
                                                     :popover="__('system.server_version_desc')">
                        <option class="dark:text-gray-500"
                                value="07" {{ config('pw-config.server_version') === '07' ? 'selected' : null }}> v07
                        </option>
                        <option class="dark:text-gray-500"
                                value="63" {{ config('pw-config.server_version') === '63' ? 'selected' : null }}> v63
                        </option>
                        <option class="dark:text-gray-500"
                                value="69" {{ config('pw-config.server_version') === '69' ? 'selected' : null }}> v69
                        </option>
                        <option class="dark:text-gray-500"
                                value="70" {{ config('pw-config.server_version') === '70' ? 'selected' : null }}> v70
                        </option>
                        <option class="dark:text-gray-500"
                                value="80" {{ config('pw-config.server_version') === '80' ? 'selected' : null }}> v80
                        </option>
                        <option class="dark:text-gray-500"
                                value="85" {{ config('pw-config.server_version') === '85' ? 'selected' : null }}> v85
                        </option>
                        <option class="dark:text-gray-500"
                                value="88" {{ config('pw-config.server_version') === '88' ? 'selected' : null }}> v88
                        </option>
                        <option class="dark:text-gray-500"
                                value="101" {{ config('pw-config.server_version') === '101' ? 'selected' : null }}> v101
                        </option>
                        <option class="dark:text-gray-500"
                                value="156" {{ config('pw-config.server_version') === '156' ? 'selected' : null }}> v156
                        </option>
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="server_version">{{ __('system.server_version') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover id="encryption_type" name="encryption_type" required
                                                     :popover="__('system.encrypt_type_desc')">
                        <option class="dark:text-gray-500"
                                value="md5" {{ config('pw-config.encryption_type') === 'md5' ? 'selected' : null }}> {{ __('system.encrypt.md5') }} </option>
                        <option class="dark:text-gray-500"
                                value="base64" {{ config('pw-config.encryption_type') === 'base64' ? 'selected' : null }}> {{ __('system.encrypt.base64') }} </option>
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="encryption_type">{{ __('system.encrypt_type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover id="datetimezone" name="datetimezone" required
                                                     :popover="__('system.datetimezone_desc')">
                        @foreach( DateTimeZone::listIdentifiers() as $timezone => $value )
                            <option class="dark:text-gray-500"
                                    value="{{ $value }}" {{ config('app.timezone') == $value ? 'selected' : null }}> {{ $value }} </option>
                        @endforeach
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="datetimezone">{{ __('system.datetimezone') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

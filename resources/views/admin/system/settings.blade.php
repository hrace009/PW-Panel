@section('title', ' - ' . __('admin.menu.system'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.menu.settings') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <form method="post" action="{{ route('admin.settings.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="server_name" name="server_name" value="{{ config('pw-config.server_name') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="server_name">{{ __('admin.settings.server') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="currency_name" name="currency_name"
                                       value="{{ config('pw-config.currency_name') }}" placeholder=" " required/>
                    <x-hrace009::label for="currency_name">{{ __('admin.settings.currency') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="server_ip" name="server_ip" value="{{ config('pw-config.server_ip') }}"
                                       placeholder=" " required/>
                    <x-hrace009::label for="server_ip">{{ __('admin.settings.ip') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="server_version" name="server_version" required>
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
                    </x-hrace009::select>
                    <x-hrace009::label for="server_version">{{ __('admin.settings.version') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="encryption_type" name="encryption_type" required>
                        <option class="dark:text-gray-500"
                                value="md5" {{ config('pw-config.encryption_type') === 'md5' ? 'selected' : null }}> {{ __('admin.encryption_type.md5') }} </option>
                        <option class="dark:text-gray-500"
                                value="base64" {{ config('pw-config.encryption_type') === 'base64' ? 'selected' : null }}> {{ __('admin.encryption_type.base64') }} </option>
                    </x-hrace009::select>
                    <x-hrace009::label for="encryption_type">{{ __('admin.settings.encryption') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

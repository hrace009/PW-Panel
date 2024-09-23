@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.ipaymu.title') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.donate.ipaymu.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('ipaymu.status') }}"
                                   @if( config('ipaymu.status') === true ) checked @endif
                                @popper({{ __('donate.ipaymu.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('ipaymu.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('ipaymu.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="sandbox_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="sandbox" name="sandbox"
                                       value="{{ config('ipaymu.sandbox') }}"
                                       @if( config('ipaymu.sandbox') === true ) checked @endif
                                    @popper({{ __('donate.ipaymu.sandbox_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="sandbox">
                                        @if( config('ipaymu.sandbox') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="status_switch">{{ __('donate.sandbox') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="double_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="double" name="double"
                                       value="{{ config('ipaymu.double') }}"
                                       @if( config('ipaymu.double') === true ) checked @endif
                                    @popper({{ __('donate.ipaymu.double_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="status">
                                        @if( config('ipaymu.double') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="double_switch">{{ __('donate.ipaymu.double') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="va" name="va"
                                                        value="{{ config('ipaymu.va') }}"
                                                        placeholder=" " :popover="__('donate.ipaymu.va_desc')"/>
                        <x-hrace009::label for="va">{{ __('donate.ipaymu.va') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="key" name="key"
                                                        value="{{ config('ipaymu.key') }}"
                                                        placeholder=" " :popover="__('donate.ipaymu.apikey_desc')"/>
                        <x-hrace009::label for="secret">{{ __('donate.ipaymu.apikey') }}</x-hrace009::label>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="refid" name="refid"
                                                            value="{{ config('ipaymu.refid') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.refid_desc')"/>
                            <x-hrace009::label
                                for="refid">{{ __('donate.ipaymu.refid') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="currency_per" name="currency_per"
                                                            value="{{ config('ipaymu.currency_per') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.currency_per_desc', ['coin' => config('pw-config.currency_name'), 'currency' => 'IDR' ])"/>
                            <x-hrace009::label
                                for="currency_per">{{ __('donate.ipaymu.currency_per', ['coin' => config('pw-config.currency_name'),'currency' => 'IDR' ]) }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="maximum" name="maximum"
                                                            value="{{ config('ipaymu.maximum') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.maximum_desc')"/>
                            <x-hrace009::label for="maximum">{{ __('donate.ipaymu.maximum') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="minimum" name="minimum"
                                                            value="{{ config('ipaymu.minimum') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.minimum_desc')"/>
                            <x-hrace009::label for="minimum">{{ __('donate.ipaymu.minimum') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="mingetbonus" name="mingetbonus"
                                                            value="{{ config('ipaymu.mingetbonus') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.mingetbonus_desc', ['currency' => config('pw-config.currency_name')])"/>
                            <x-hrace009::label
                                for="mingetbonus">{{ __('donate.ipaymu.mingetbonus') }}</x-hrace009::label>
                        </div>
                        =>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bonusess" name="bonusess"
                                                            value="{{ config('ipaymu.bonusess') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.bonusess_desc')"/>
                            <x-hrace009::label for="bonusess">{{ __('donate.ipaymu.bonusess') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="route" name="route"
                                                            value="{{ config('ipaymu.route') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.route_desc')"/>
                            <x-hrace009::label
                                for="route">{{ __('donate.ipaymu.route') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <code>Your current Route for Callback is: {{ route('api.ipaymu') }}</code>
                    </div>
                    <div class="flex flex-row gap-8">
                        <code>NOTE: Please change this route regular to avoid hacking or injection </code>
                    </div>
                @endif
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

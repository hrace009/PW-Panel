@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.paypal.title') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.donate.paypal.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('pw-config.payment.paypal.status') }}"
                                   @if( config('pw-config.payment.paypal.status') === true ) checked @endif
                                   @popper({{ __('donate.paypal.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('pw-config.payment.paypal.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('pw-config.payment.paypal.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="sandbox_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="sandbox" name="sandbox"
                                       value="{{ config('pw-config.payment.paypal.sandbox') }}"
                                       @if( config('pw-config.payment.paypal.sandbox') === true ) checked @endif
                                    @popper({{ __('donate.paypal.sandbox_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="sandbox">
                                        @if( config('pw-config.payment.paypal.sandbox') === true )
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
                                       value="{{ config('pw-config.payment.paypal.double') }}"
                                       @if( config('pw-config.payment.paypal.double') === true ) checked @endif
                                    @popper({{ __('donate.paypal.double_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="status">
                                        @if( config('pw-config.payment.paypal.double') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="double_switch">{{ __('donate.paypal.double') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="client_id" name="client_id"
                                                        value="{{ config('pw-config.payment.paypal.client_id') }}"
                                                        placeholder=" " :popover="__('donate.paypal.client_id_desc')"/>
                        <x-hrace009::label for="client_id">{{ __('donate.paypal.client_id') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="secret" name="secret"
                                                        value="{{ config('pw-config.payment.paypal.secret') }}"
                                                        placeholder=" " :popover="__('donate.paypal.secret_desc')"/>
                        <x-hrace009::label for="secret">{{ __('donate.paypal.secret') }}</x-hrace009::label>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::select-with-popover id="currency" name="currency" required
                                                             :popover="__('donate.paypal.currency_desc')">
                                @foreach( __('donate.currency') as $currency => $caption )
                                    <option class="dark:text-gray-500"
                                            @if( $currency === config('pw-config.payment.paypal.currency') )
                                                selected
                                            @endif
                                            value="{{ $currency }}">{{ $caption }}
                                    </option>
                                @endforeach
                            </x-hrace009::select-with-popover>
                            <x-hrace009::label for="currency">{{ __('donate.paypal.currency') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="currency_per" name="currency_per"
                                                            value="{{ config('pw-config.payment.paypal.currency_per') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.paypal.currency_per_desc', ['coin' => config('pw-config.currency_name'), 'currency' => __('donate.currency.' . config('pw-config.payment.paypal.currency')) ])"/>
                            <x-hrace009::label
                                for="currency_per">{{ __('donate.paypal.currency_per', ['currency' => __('donate.currency.' . config('pw-config.payment.paypal.currency')) ]) }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="minimum" name="minimum"
                                                            value="{{ config('pw-config.payment.paypal.minimum') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.paypal.minimum_desc')"/>
                            <x-hrace009::label for="minimum">{{ __('donate.paypal.minimum') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="maximum" name="maximum"
                                                            value="{{ config('pw-config.payment.paypal.maximum') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.paypal.maximum_desc')"/>
                            <x-hrace009::label for="maximum">{{ __('donate.paypal.maximum') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="mingetbonus" name="mingetbonus"
                                                            value="{{ config('pw-config.payment.paypal.mingetbonus') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.mingetbonus_desc', ['currency' => config('pw-config.currency_name')])"/>
                            <x-hrace009::label
                                for="mingetbonus">{{ __('donate.ipaymu.mingetbonus') }}</x-hrace009::label>
                        </div>
                        =>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bonusess" name="bonusess"
                                                            value="{{ config('pw-config.payment.paypal.bonusess') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.ipaymu.bonusess_desc')"/>
                            <x-hrace009::label for="bonusess">{{ __('donate.ipaymu.bonusess') }}</x-hrace009::label>
                        </div>
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

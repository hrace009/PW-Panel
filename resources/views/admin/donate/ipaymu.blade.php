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
                                   value="{{ config('pw-config.payment.ipaymu.status') }}"
                                   @if( config('pw-config.payment.ipaymu.status') === true ) checked @endif
                                @popper({{ __('donate.ipaymu.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('pw-config.payment.ipaymu.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('pw-config.payment.ipaymu.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="sandbox_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="sandbox" name="sandbox"
                                       value="{{ config('pw-config.payment.ipaymu.sandbox') }}"
                                       @if( config('pw-config.payment.ipaymu.sandbox') === true ) checked @endif
                                    @popper({{ __('donate.ipaymu.sandbox_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="sandbox">
                                        @if( config('pw-config.payment.ipaymu.sandbox') === true )
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
                                       value="{{ config('pw-config.payment.ipaymu.double') }}"
                                       @if( config('pw-config.payment.ipaymu.double') === true ) checked @endif
                                    @popper({{ __('donate.ipaymu.double_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="status">
                                        @if( config('pw-config.payment.ipaymu.double') === true )
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
                                                        value="{{ config('pw-config.payment.ipaymu.va') }}"
                                                        placeholder=" " :popover="__('donate.ipaymu.va_desc')"/>
                        <x-hrace009::label for="va">{{ __('donate.ipaymu.va') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="apikey" name="apikey"
                                                        value="{{ config('pw-config.payment.ipaymu.apikey') }}"
                                                        placeholder=" " :popover="__('donate.ipaymu.apikey_desc')"/>
                        <x-hrace009::label for="secret">{{ __('donate.ipaymu.apikey') }}</x-hrace009::label>
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

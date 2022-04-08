@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.paymentwall_title') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            @if( config('pw-config.payment.paymentwall.status') === true )
                <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6">
                    <div class="p-2">
                        <h2 class="text-2xl font-semibold ">{{ __('donate.paymentwall_setup.title') }}</h2>
                        <hr>
                        <ol>
                            @foreach( __('donate.paymentwall_setup.steps') as $steps => $value )
                                <li>
                                    {!! __('donate.paymentwall_setup.steps.' . $steps ) !!}
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.donate.paymentwall.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('pw-config.payment.paymentwall.status') }}"
                                   @if( config('pw-config.payment.paymentwall.status') === true ) checked @endif
                                   @popper({{ __('donate.paymentwall_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('pw-config.payment.paymentwall.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('pw-config.payment.paymentwall.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="widget_code" name="widget_code"
                                                        value="{{ config('pw-config.payment.paymentwall.widget_code') }}"
                                                        placeholder=" " required
                                                        :popover="__('donate.paymentwall_link_desc')"/>
                        <x-hrace009::label for="widget_code">{{ __('donate.paymentwall_link') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="widget_width" name="widget_width"
                                                        value="{{ config('pw-config.payment.paymentwall.widget_width') }}"
                                                        placeholder=" " required
                                                        :popover="__('donate.paymentwall_widget_width_desc')"/>
                        <x-hrace009::label
                            for="widget_code">{{ __('donate.paymentwall_widget_width') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="widget_high" name="widget_high"
                                                        value="{{ config('pw-config.payment.paymentwall.widget_high') }}"
                                                        placeholder=" " required
                                                        :popover="__('donate.paymentwall_widget_high_desc')"/>
                        <x-hrace009::label
                            for="widget_code">{{ __('donate.paymentwall_widget_high') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="project_key" name="project_key"
                                                        value="{{ config('pw-config.payment.paymentwall.project_key') }}"
                                                        placeholder=" " required
                                                        :popover="__('donate.paymentwall_project_key_desc')"/>
                        <x-hrace009::label
                            for="project_key">{{ __('donate.paymentwall_project_key') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="secret_key" name="secret_key"
                                                        value="{{ config('pw-config.payment.paymentwall.secret_key') }}"
                                                        placeholder=" " required
                                                        :popover="__('donate.paymentwall_key_desc')"/>
                        <x-hrace009::label for="secret_key">{{ __('donate.paymentwall_key') }}</x-hrace009::label>
                    </div>
            @endif
            <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
            @if( config('pw-config.payment.paymentwall.status') === true )
                <div class="relative z-0 mb-6 w-full group">
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">{{ __('donate.paymentwall_preview') }}</h1>
                    </div>
                    <div class="p-4">
                        <iframe
                            src="https://api.paymentwall.com/api/ps/?key={{ config('pw-config.payment.paymentwall.project_key') }}&uid={{ Auth::user()->ID }}&widget={{ config('pw-config.payment.paymentwall.widget_code') }}"
                            width="{{ config('pw-config.payment.paymentwall.widget_width') }}"
                            height="{{ config('pw-config.payment.paymentwall.widget_high') }}"
                        ></iframe>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

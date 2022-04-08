@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.bank.title') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.donate.bank.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('pw-config.payment.bank_transfer.status') }}"
                                   @if( config('pw-config.payment.bank_transfer.status') === true ) checked @endif
                                   @popper({{ __('donate.bank.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('pw-config.payment.bank_transfer.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('pw-config.payment.bank_transfer.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="double_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="double" name="double"
                                       value="{{ config('pw-config.payment.bank_transfer.double') }}"
                                       @if( config('pw-config.payment.bank_transfer.double') === true ) checked @endif
                                       @popper({{ __('donate.bank.double_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="double">
                                        @if( config('pw-config.payment.bank_transfer.double') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="double_switch">{{ __('donate.double_donation') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="accountOwner" name="accountOwner"
                                                        value="{{ ucwords(config('pw-config.payment.bank_transfer.accountOwner')) }}"
                                                        placeholder=" " :popover="__('donate.bank.owner_desc')"/>
                        <x-hrace009::label for="accountOwner">{{ __('donate.bank.owner') }}</x-hrace009::label>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankName1" name="bankName1"
                                                            value="{{ strtoupper(config('pw-config.payment.bank_transfer.bankName1')) }}"
                                                            placeholder=" " :popover="__('donate.bank.bankName_desc')"/>
                            <x-hrace009::label for="bankName1">{{ __('donate.bank.bankName1') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankAccountNo1" name="bankAccountNo1"
                                                            value="{{ ucwords(config('pw-config.payment.bank_transfer.bankAccountNo1')) }}"
                                                            placeholder=" "
                                                            :popover="__('donate.bank.bankAccountNo_desc')"/>
                            <x-hrace009::label
                                for="bankAccountNo1">{{ __('donate.bank.bankAccountNo1') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankName2" name="bankName2"
                                                            value="{{ strtoupper(config('pw-config.payment.bank_transfer.bankName2')) }}"
                                                            placeholder=" " :popover="__('donate.bank.bankName_desc')"/>
                            <x-hrace009::label for="bankName2">{{ __('donate.bank.bankName2') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankAccountNo2" name="bankAccountNo2"
                                                            value="{{ ucwords(config('pw-config.payment.bank_transfer.bankAccountNo2')) }}"
                                                            placeholder=" "
                                                            :popover="__('donate.bank.bankAccountNo_desc')"/>
                            <x-hrace009::label
                                for="bankAccountNo2">{{ __('donate.bank.bankAccountNo2') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankName3" name="bankName3"
                                                            value="{{ strtoupper(config('pw-config.payment.bank_transfer.bankName3')) }}"
                                                            placeholder=" " :popover="__('donate.bank.bankName_desc')"/>
                            <x-hrace009::label for="bankName3">{{ __('donate.bank.bankName3') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bankAccountNo3" name="bankAccountNo3"
                                                            value="{{ ucwords(config('pw-config.payment.bank_transfer.bankAccountNo3')) }}"
                                                            placeholder=" "
                                                            :popover="__('donate.bank.bankAccountNo_desc')"/>
                            <x-hrace009::label
                                for="bankAccountNo3">{{ __('donate.bank.bankAccountNo3') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="multiply" name="multiply"
                                                            value="{{ config('pw-config.payment.bank_transfer.multiply') }}"
                                                            placeholder=" " :popover="__('donate.bank.multiply_desc')"/>
                            <x-hrace009::label for="multiply">{{ __('donate.bank.multiply') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="limit" name="limit"
                                                            value="{{ config('pw-config.payment.bank_transfer.limit') }}"
                                                            placeholder=" " :popover="__('donate.bank.limit_desc')"/>
                            <x-hrace009::label for="limit">{{ __('donate.bank.limit') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="CurrencySign" name="CurrencySign"
                                                            value="{{ config('pw-config.payment.bank_transfer.CurrencySign') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.bank.CurrencySign_desc')"/>
                            <x-hrace009::label
                                for="CurrencySign">{{ __('donate.bank.CurrencySign') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="payment_price" name="payment_price"
                                                            value="{{ config('pw-config.payment.bank_transfer.payment_price') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.bank.payment_price_desc', ['coinName' => config('pw-config.currency_name')])"/>
                            <x-hrace009::label
                                for="payment_price">{{ __('donate.bank.payment_price', ['coinName' => config('pw-config.currency_name')]) }}</x-hrace009::label>
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

@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.donate.bank') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h2 class="text-2xl font-semibold">{{ __('donate.guide.bank.title', ['currency' => config('pw-config.currency_name')]) }}</h2>
            </div>
            <div class="p-2">
                @if( config('pw-config.payment.bank_transfer.accountOwner') )
                    <p class="text-sm">{{ __('donate.guide.bank.text1') }}</p>
                    <div class="text-sm">{{ __('donate.guide.bank.text2') }}</div>
                    <div
                        class="text-sm font-semibold">{{ __('donate.guide.bank.bankHolder', ['name' => config('pw-config.payment.bank_transfer.accountOwner')]) }}</div>
                    <ul class="font-semibold">
                        @if( config('pw-config.payment.bank_transfer.bankName1') && config('pw-config.payment.bank_transfer.bankAccountNo1') )
                            <li>{{ __('donate.bank.caption') }} {{ strtoupper(config('pw-config.payment.bank_transfer.bankName1')) }}
                                : {{ config('pw-config.payment.bank_transfer.bankAccountNo1') }}</li>
                        @endif

                        @if( config('pw-config.payment.bank_transfer.bankName2') && config('pw-config.payment.bank_transfer.bankAccountNo2') )
                            <li>{{ __('donate.bank.caption') }} {{ strtoupper(config('pw-config.payment.bank_transfer.bankName2')) }}
                                : {{ config('pw-config.payment.bank_transfer.bankAccountNo2') }}</li>
                        @endif

                        @if( config('pw-config.payment.bank_transfer.bankName3') && config('pw-config.payment.bank_transfer.bankAccountNo3') )
                            <li>{{ __('donate.bank.caption') }} {{ strtoupper(config('pw-config.payment.bank_transfer.bankName3')) }}
                                : {{ config('pw-config.payment.bank_transfer.bankAccountNo3') }}</li>
                        @endif
                    </ul>
                    <div
                        class="text-sm font-semibold">{{ __('donate.guide.bank.multiply', ['currencySign' => config('pw-config.payment.bank_transfer.CurrencySign'), 'number' => number_format(config('pw-config.payment.bank_transfer.multiply'), 0, '.','.')]) }}</div>
                    <div
                        class="text-sm font-semibold">{{ __('donate.guide.bank.limit', ['sign' => config('pw-config.payment.bank_transfer.CurrencySign'), 'number' => number_format(config('pw-config.payment.bank_transfer.limit') , 0, '.','.') ]) }}</div>
                    <div
                        class="text-sm font-semibold">{{ __('donate.guide.bank.price_coin', ['coin' => config('pw-config.currency_name'), 'sign' => config('pw-config.payment.bank_transfer.CurrencySign'), 'currency' => number_format(config('pw-config.payment.bank_transfer.payment_price') , 0, '.','.')]) }}</div>
                    <div class="text-sm">{{ __('donate.guide.bank.text3') }}</div>
                    <div class="text-sm">{{ __('donate.guide.bank.text4') }}</div>
                    @if( config('pw-config.payment.bank_transfer.double') )
                        <span class="blinking dark:text-cyan-400">Double Donate On</span>
                    @endif
                @else
                    <span
                        class="border rounded bg-red-500 p-1 border-red-400 ">{{ __('donate.guide.bank.noData') }}</span>
                @endif
            </div>
        </div>
        <div class="max-w-md mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('app.donate.bank.post') }}">
                {!! csrf_field() !!}
                <input id="gameID" name="gameID" type="hidden" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="fullname" name="fullname"
                                                    placeholder=" " readonly
                                                    value="{{ Auth::user()->truename }}"
                                                    popover="{{ __('donate.guide.bank.form.fullname_desc') }}"
                    />
                    <x-hrace009::label
                        for="fullname">{{ __('donate.guide.bank.form.fullname') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="banknum" name="banknum"
                                                    placeholder=" "
                                                    popover="{{ __('donate.guide.bank.form.banknum_desc') }}"/>
                    <x-hrace009::label
                        for="banknum">{{ __('donate.guide.bank.form.banknum') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="loginid" name="loginid"
                                                    placeholder=" " readonly
                                                    value="{{ Auth::user()->name }}"
                                                    popover="{{ __('donate.guide.bank.form.loginid_desc') }}"
                    />
                    <x-hrace009::label
                        for="loginid">{{ __('donate.guide.bank.form.loginid') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="email" name="email"
                                                    placeholder=" " readonly
                                                    value="{{ Auth::user()->email }}"
                                                    popover="{{ __('donate.guide.bank.form.email_desc') }}"
                    />
                    <x-hrace009::label
                        for="email">{{ __('donate.guide.bank.form.email') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="phone" name="phone"
                                                    placeholder=" "
                                                    popover="{{ __('donate.guide.bank.form.phone_desc') }}"/>
                    <x-hrace009::label
                        for="phone">{{ __('donate.guide.bank.form.phone') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover
                        popover="{{ __('donate.guide.bank.form.type_desc') }}"
                        id="type"
                        name="type"
                    >
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        <option class="dark:text-gray-500"
                                value="inet"> {{ __('donate.guide.bank.form.inet') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="atm"> {{ __('donate.guide.bank.form.atm') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="cod"> {{ __('donate.guide.bank.form.cod') }}
                        </option>
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="type">{{ __('donate.guide.bank.form.type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover
                        popover="{{ __('donate.guide.bank.form.bankname_desc') }}"
                        id="bankname"
                        name="bankname"
                    >
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        @if( config('pw-config.payment.bank_transfer.bankName1') )
                            <option class="dark:text-gray-500"
                                    value="bankName1"> {{ strtoupper(config('pw-config.payment.bank_transfer.bankName1')) . ' [ ' . config('pw-config.payment.bank_transfer.bankAccountNo1') . ' ]' }}
                            </option>
                        @endif
                        @if( config('pw-config.payment.bank_transfer.bankName2') )
                            <option class="dark:text-gray-500"
                                    value="bankName2"> {{ strtoupper(config('pw-config.payment.bank_transfer.bankName2')) . ' [ ' . config('pw-config.payment.bank_transfer.bankAccountNo2') . ' ]'}}
                            </option>
                        @endif
                        @if( config('pw-config.payment.bank_transfer.bankName3') )
                            <option class="dark:text-gray-500"
                                    value="bankName3"> {{ strtoupper(config('pw-config.payment.bank_transfer.bankName3')) . ' [ ' . config('pw-config.payment.bank_transfer.bankAccountNo3') . ' ]' }}
                            </option>
                        @endif
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="bankname">{{ __('donate.guide.bank.form.bankname') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover
                        popover="{{ __('donate.guide.bank.form.amount_desc') }}"
                        id="amount"
                        name="amount"
                    >
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        @for( $i=config('pw-config.payment.bank_transfer.multiply'); $i<=config('pw-config.payment.bank_transfer.limit'); $i+=config('pw-config.payment.bank_transfer.multiply') )
                            <option class="dark:text-gray-500"
                                    value="{{ number_format( ($i/config('pw-config.payment.bank_transfer.payment_price')), 0, '', '' ) }}">
                                {{ (config('pw-config.payment.bank_transfer.double') ? config('pw-config.payment.bank_transfer.CurrencySign') . number_format($i, 0, '.','.') . ' (' . number_format(($i*2/config('pw-config.payment.bank_transfer.payment_price')),0,'.','.') . ' '. config('pw-config.currency_name') . ') Double' : config('pw-config.payment.bank_transfer.CurrencySign') . number_format($i, 0, '.','.') . ' (' . number_format(($i/config('pw-config.payment.bank_transfer.payment_price')),0,'.','.') . ' '. config('pw-config.currency_name') . ')' ) }}
                            </option>
                        @endfor
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="amount">{{ __('donate.guide.bank.form.amount') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-end items-center">
                    <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                        {{ __('donate.submit') }}
                    </x-hrace009::button-with-popover>
                </div>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.app>

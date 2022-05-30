@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.history.title') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="mx-auto mt-4 rounded max-w-3xl xl:-mx-4">
            <!-- Tabs -->
            <ul id="tabs"
                class="flex inline-flex w-full list-none px-1 pt-2 bg-transparent border rounded-t dark:border-primary-darker">
                <li class="flex flex-1 justify-center px-4 py-2 -mb-px font-semibold border-b dark:border-primary rounded-t bg-gray-50 dark:bg-primary">
                    <a id="default-tab" href="#ingame">{{ __('donate.history.ingame') }}</a></li>
                <li class="flex flex-1 justify-center px-4 py-2 font-semibold rounded-t "><a
                        href="#paymentwall">{{ __('donate.history.paymentwall') }}</a></li>
                <li class="flex flex-1 justify-center px-4 py-2 font-semibold rounded-t "><a
                        href="#store">{{ __('donate.history.store') }}</a></li>
                <li class="flex flex-1 justify-center px-4 py-2 font-semibold rounded-t "><a
                        href="#bank">{{ __('donate.history.bank') }}</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents"
                 class="flex inline-flex ml-4 w-full px-1 pt-2 bg-transparent border-l border-r border-b dark:border-primary-darker">
                <div id="ingame" class="hidden p-4 mx-auto">
                    ingame tab
                </div>
                <div id="paymentwall" class="hidden p-4 mx-auto">
                    <div
                        class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.no') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.refid') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.date') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.userid') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.Paymentwall.status') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-xs dark:text-light">
                            @for( $i=1; $i<=$pws->count(); )
                                @foreach( $pws->sortByDesc('created_at')  as $pw )
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $i++ }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $pw->refid }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ date_format($pw->created_at, 'F j, Y')  }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $user->whereId($pw->userID)->get()->firstOrFail()->name  }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $pw->amount  }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{!! $pw->color($pw->type) !!}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endfor
                            </tbody>
                        </table>
                        @if( $pws->items() )
                            {{ $pws->render() }}
                        @endif
                    </div>
                </div>
                <div id="store" class="hidden p-4 mx-auto">
                    store tab
                </div>
                <div id="bank" class="hidden p-4 mx-auto">
                    <div
                        class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                        <table class="w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.trid') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.date') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.bankname') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.status') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('donate.history.table.reason') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-xs dark:text-light">
                            @foreach( $banks->sortByDesc('created_at') as $bank)
                                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>#{{ $bank->id }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ date_format($bank->created_at, 'F j, Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ strtoupper(config('pw-config.payment.bank_transfer.' . $bank->bankname)) }}</span>
                                        </div>
                                    </td>
                                    <td class="flex flex-col py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ config('pw-config.payment.bank_transfer.CurrencySign') . number_format(($bank->amount * config('pw-config.payment.bank_transfer.payment_price')),0,'.','.') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span>{{ number_format(($bank->amount ),0,'','') . ' '. config('pw-config.currency_name')  }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span
                                                @popper({{ ($bank->reason ? __('donate.history.table.reason') . ': ' . $bank->reason : '') }})
                                                class="{{ $bank->color( $bank->status ) }} py-1 px-3 rounded-full text-xs">{{ ucwords( $bank->status ) }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{ $bank->reason }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if( $banks->items() )
                            {{ $banks->render() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.app>

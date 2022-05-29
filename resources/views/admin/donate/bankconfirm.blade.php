@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.bank.confirm') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
            <div
                class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                <table class="w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.trid') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.date') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.fullname') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.loginid') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.contact.caption') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.type') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.bankname') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.amount') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.status') }}</th>
                        <th class="py-3 px-2 text-left">{{ __('donate.history.table.action') }}</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs dark:text-light">
                    @foreach( $logs as $log)
                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                            <td class="py-3 px-2 text-left">
                                <div class="flex flex-row items-center">
                                    <span>#{{ $log->id }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex flex-row items-center">
                                    <span>{{ date_format($log->created_at, 'F j, Y') }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex flex-row items-center">
                                    <span>{{ $log->fullname }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex items-center">
                                    <span>{{ $user->whereId($log->gameID)->get()->firstOrFail()->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex flex-col">
                                    <span>{{ $log->email }}</span>
                                    <span>{{ $log->phone }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex items-center">
                                    <span>{{ __( 'donate.guide.bank.form.' . $log->type ) }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex items-center">
                                    <span>{{ strtoupper(config('pw-config.payment.bank_transfer.' . $log->bankname )) }}</span>
                                </div>
                            </td>
                            <td class="flex flex-col py-3 px-2 text-left">
                                <div class="flex items-center">
                                    <span>{{ config('pw-config.payment.bank_transfer.CurrencySign') . number_format(($log->amount * config('pw-config.payment.bank_transfer.payment_price')),0,'.','.') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span>{{ number_format(($log->amount ),0,'','') . ' '. config('pw-config.currency_name')  }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex items-center">
                                    <span
                                        @popper({{ ( $log->reason ? __('donate.history.table.reason') . ': ' . $log->reason : '' ) }})
                                        class="{{ $log->color( $log->status ) }} py-1 px-3 rounded-full text-xs">{{ ucwords( $log->status ) }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-2 text-left">
                                <div class="flex items-center">
                                    @if( $log->status === 'pending' )
                                        <div x-data="{ {{ $log->loginid . $log->id }}_Confirm : false }">
                                            <!-- Button -->
                                            <x-hrace009::button
                                                @click="{{ $log->loginid . $log->id }}_Confirm = !{{ $log->loginid . $log->id }}_Confirm"
                                                class="w-auto ml-1"
                                            >
                                                        <span @popper(
                                                              {{ __('donate.history.table.change', ['id' => $log->id]) }} )>
                                                            <svg class="w-5 h-5"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24"
                                                                 width="18"
                                                                 height="18"
                                                                 stroke="currentColor"
                                                                 fill="none"
                                                            >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M12 12.586l4.243 4.242-1.415 1.415L13 16.415V22h-2v-5.587l-1.828 1.83-1.415-1.415L12 12.586zM12 2a7.001 7.001 0 0 1 6.954 6.194 5.5 5.5 0 0 1-.953 10.784L18 17a6 6 0 0 0-11.996-.225L6 17v1.978a5.5 5.5 0 0 1-.954-10.784A7 7 0 0 1 12 2z"
                                                            />
                                                        </svg>
                                                        </span>
                                            </x-hrace009::button>
                                            <!-- Modal  -->
                                            <div
                                                x-show="{{ $log->loginid . $log->id }}_Confirm"
                                                class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in duration-200"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                style="display: none;"
                                            >
                                                <!-- Modal -->
                                                <div
                                                    x-show="{{ $log->loginid . $log->id }}_Confirm"
                                                    class="dark:bg-dark rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                    @click.away="{{ $log->loginid . $log->id }}_Confirm = false"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    style="display: none;"
                                                >
                                                    <div class="text-lg font-semibold mb-6">
                                                        {{ __('donate.history.table.change', ['id' => $log->id]) }}
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.donate.updateconfirm', $log->id ) }}"
                                                        method="post">
                                                        {!! csrf_field() !!}
                                                        <input id="gameID" name="gameID" value="{{ $log->gameID }}"
                                                               type="hidden"/>
                                                        <div class="relative z-0 mb-6 w-full group">
                                                            <x-hrace009::select-with-popover
                                                                popover="{{ __('donate.history.change.status') }}"
                                                                id="status"
                                                                name="status"
                                                            >
                                                                <option class="dark:text-gray-500"
                                                                        value=""> -
                                                                </option>
                                                                <option class="dark:text-gray-500"
                                                                        value="accept"> {{ __('donate.history.accept') }}
                                                                </option>
                                                                <option class="dark:text-gray-500"
                                                                        value="reject"> {{ __('donate.history.reject') }}
                                                                </option>
                                                            </x-hrace009::select-with-popover>
                                                            <x-hrace009::label
                                                                for="status">{{ __('donate.history.table.status') }}</x-hrace009::label>
                                                        </div>
                                                        <div class="relative z-0 mb-6 w-full group">
                                                            <x-hrace009::input-with-popover id="reason" name="reason"
                                                                                            placeholder=" "
                                                                                            popover="{{ __('donate.history.reason', ['id' => $log->id ]) }}"/>
                                                            <x-hrace009::label
                                                                for="reason">{{ __('donate.history.table.reason') }}</x-hrace009::label>
                                                        </div>
                                                        <div
                                                            class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                            <x-hrace009::button class="w-auto">
                                                                {{ __('donate.submit')  }}
                                                            </x-hrace009::button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( $logs->items() )
                    {{ $logs->render() }}
                @endif
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

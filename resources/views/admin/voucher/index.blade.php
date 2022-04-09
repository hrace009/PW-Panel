@section('title', ' - ' . __('voucher.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('voucher.view') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-2 ml-2 mr-2">
            @if( ! $vouchers->items() )
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ __('voucher.emtpy') }}</strong>
                    <span class="block sm:inline">{{ __('news.try') }}</span>
                </div>
            @else
                <div class="flex flex-col pl-6 pr-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle min-w-0 inline-block sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border dark:border-primary-darker sm:rounded-lg">
                                <table class="min-w-0 text-xs font-medium">
                                    <thead
                                        class="dark:bg-darker dark:text-light border-b dark:border-primary-darker uppercase">
                                    <tr>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('voucher.code') }}</th>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('voucher.amount', ['currency' => config('pw-config.currency_name')]) }}</th>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('voucher.times_redeemed') }}</th>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider text-center">{{ __('voucher.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-transparent">
                                    @foreach( $vouchers as $voucher )
                                        <tr>
                                            <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker text-center border-r">
                                                {{ $voucher->code }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker text-center border-r">
                                                {{ $voucher->amount }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker text-center border-r">
                                                {{ $voucher->times_redeemed }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap text-center">
                                                <div class="flex items-center">
                                                    <x-hrace009::button-with-popover
                                                        popover="{{ __('voucher.edit_desc') }}"
                                                        onclick="window.location.href='{{ route('voucher.edit', $voucher ) }}'"
                                                        class="mr-2">{{ __('voucher.edit') }}</x-hrace009::button-with-popover>
                                                    <form action="{{ route('voucher.destroy', $voucher)}}"
                                                          method="post">
                                                        {!! csrf_field() !!}
                                                        @method('DELETE')
                                                        <x-hrace009::button-with-popover
                                                            popover="{{ __('voucher.destroy_desc') }}"
                                                            type="submit">{{ __('voucher.destroy') }}</x-hrace009::button-with-popover>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2 ml-2 mr-2 items-center justify-between">
                                @if( $vouchers ?? '' )
                                    {{ $vouchers->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

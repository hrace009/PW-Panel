@section('title', ' - ' . __('manage.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('manage.gm') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.ingamemanage.postGM') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="account_id" name="account_id"
                                                    placeholder=" " :popover="__('manage.fields.gm.account_id_desc')"/>
                    <x-hrace009::label for="account_id">{{ __('manage.fields.gm.account_id') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('manage.submit.gm.add') }}
                </x-hrace009::button>
            </form>
        </div>
        <div class="max-w-2xl mx-auto my-6">
            @if( ! $gms )
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ __('voucher.emtpy') }}</strong>
                    <span class="block sm:inline">{{ __('news.try') }}</span>
                </div>
            @else
                <div class="flex flex-col px-6 py-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle w-auto inline-block sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border dark:border-primary-darker sm:rounded-lg">
                                <table class="ww-auto table-auto text-xs font-medium">
                                    <thead
                                        class="dark:bg-darker dark:text-light border-b dark:border-primary-darker uppercase">
                                    <tr>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider border-r dark:border-primary-darker">{{ __('manage.table.gm.id') }}</th>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider border-r dark:border-primary-darker">{{ __('manage.table.gm.name') }}</th>
                                        <th scope="col"
                                            class="px-2 py-3 tracking-wider">{{ __('manage.table.gm.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-transparent">
                                    @foreach( $gms as $gm )
                                        <tr>
                                            <td id="user_id"
                                                class="px-2 py-3 whitespace-nowrap dark:border-primary-darker border-r">
                                                {{ $gm->userid }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap dark:border-primary-darker border-r">
                                                {{ \App\Models\User::find( $gm->userid )['name'] }}
                                            </td>
                                            <td class="px-2 py-3 whitespace-nowrap">
                                                <div class="flex flex-row">
                                                    <x-hrace009::button
                                                        onclick="window.location.href='{{ route('admin.management.gm.edit', $gm->userid ) }}'"
                                                        class="w-auto mx-4"
                                                    >
                                                        {{ __('manage.change_permissions') }}
                                                    </x-hrace009::button>
                                                    <x-hrace009::button
                                                        onclick="window.location.href='{{ route('admin.management.gm.revoke', $gm->userid ) }}'"
                                                        class="w-auto mx-4"
                                                    >
                                                        {{ __('manage.submit.gm.destroy') }}
                                                    </x-hrace009::button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

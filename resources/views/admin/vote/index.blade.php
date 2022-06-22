@section('title', ' - ' . __('vote.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('vote.index.header') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.automate-panel/>
            <ul class="w-3/4 px-8 py-4 mx-auto  mb-6 list-none">
                @foreach( $sites as $site )
                    <li class="dark:bg-darker my-2 rounded-lg shadow-lg" x-data="accordion({{ $site->id }})">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                                <span
                                    class="text-sm dark:text-light">#{{ $site->id . ' ' . strtoupper($site->name) }}</span>
                            <div
                                class="flex flex-row px-3 py-1 justify-between items-center text-sm font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer {{ $site->color($site->type) }}">{{ $site->type === 'cubi' ? __('vote.create.type_cubi') : __('vote.create.type_virtual', ['currency' => config('pw-config.currency_name')]) }}
                                <svg
                                    :class="handleRotate()"
                                    class="fill-current h-6 w-6 transform transition-transform duration-500"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                </svg>
                            </div>
                        </h2>
                        <div
                            x-ref="tab"
                            :style="handleToggle()"
                            class="overflow-hidden max-h-0 duration-500 transition-all"
                        >
                            <div class="p-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>{{ __('vote.create.link') }}: {!! $site->link !!}</div>
                                    <div>{{ __('vote.create.type') }}
                                        : {{ $site->type === 'virtual' ? __('vote.create.type_virtual', ['currency' => config('pw-config.currency_name')]) : __('vote.create.type_cubi') }}</div>
                                    <div>{{ __('vote.create.reward_amount') }}
                                        : {{ $site->type === 'virtual' ? $site->reward_amount . ' ' . __('vote.create.type_virtual', ['currency' => config('pw-config.currency_name')]) : $site->reward_amount . ' ' . __('vote.create.type_cubi') }}</div>
                                    <div>{{ __('vote.create.hour_limit') }}
                                        : {{ $site->hour_limit }} {{ __('vote.index.hour') }}</div>
                                </div>
                            </div>
                            <div class="p-3 flex items-center justify-between mt-4">
                                <div class="flex items-center">
                                    <x-hrace009::button-with-popover
                                        popover="{{ __('vote.index.edit_desc', ['name' => $site->name]) }}"
                                        onclick="window.location.href='{{ route('vote.edit', $site ) }}'"
                                        class="mr-2">{{ __('vote.index.edit_button') }}</x-hrace009::button-with-popover>
                                    <form action="{{ route('vote.destroy', $site )}}" method="post">
                                        {!! csrf_field() !!}
                                        @method('DELETE')
                                        <x-hrace009::button-with-popover
                                            popover="{{ __('general.delete') }}"
                                            type="submit">{{ __('general.delete') }}</x-hrace009::button-with-popover>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

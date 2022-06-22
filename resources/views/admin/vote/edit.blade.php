@section('title', ' - ' . __('vote.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('vote.edit.header', ['site' => $site->name]) }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('vote.update', $site ) }}">
                {!! csrf_field() !!}
                @method('PATCH')
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="name" name="name"
                                                    placeholder=" "
                                                    value="{{ $site->name }}"
                                                    :popover="__('vote.create.name_desc')"/>
                    <x-hrace009::label
                        for="name">{{ __('vote.create.name') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="link" name="link"
                                                    placeholder=" "
                                                    value="{{ $site->link }}"
                                                    :popover="__('vote.create.link_desc')"/>
                    <x-hrace009::label
                        for="link">{{ __('vote.create.link') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-4 w-full group">
                    <div id="type_switch" class="flex ml-20">
                        <div class="pretty p-switch">
                            <input type="radio" id="type" name="type" value="cubi"
                                   {{ $site->type === 'cubi' ? 'checked' : '' }}
                                   @popper({{ __('vote.create.type_cubi_desc') }})/>
                            <div class="state p-info">
                                <label for="type">{{ __('vote.create.type_cubi') }}</label>
                            </div>
                        </div>
                        <div class="pretty p-switch">
                            <input type="radio" id="type" name="type" value="virtual"
                                   {{ $site->type === 'virtual' ? 'checked' : '' }}
                                   @popper({{ __('vote.create.type_virtual_desc', ['currency' => config('pw-config.currency_name')]) }})/>
                            <div class="state p-info">
                                <label
                                    for="type">{{ __('vote.create.type_virtual', ['currency' => config('pw-config.currency_name')]) }}</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="type_switch">{{ __('vote.create.type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="reward_amount" name="reward_amount"
                                                    placeholder=" "
                                                    value="{{ $site->reward_amount }}"
                                                    :popover="__('vote.create.reward_amount_desc')"/>
                    <x-hrace009::label
                        for="reward_amount">{{ __('vote.create.reward_amount') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="hour_limit" name="hour_limit"
                                                    placeholder=" "
                                                    value="{{ $site->hour_limit }}"
                                                    :popover="__('vote.create.hour_limit_desc')"/>
                    <x-hrace009::label
                        for="hour_limit">{{ __('vote.create.hour_limit') }}</x-hrace009::label>
                </div>
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('vote.edit.modify_desc') }}">
                    {{ __('vote.edit.modify') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

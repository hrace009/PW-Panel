@section('title', ' - ' . __('vote.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('vote.arena.header') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.automate-panel/>
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.vote.arena.submit') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('pw-config.vote.arena.status') }}"
                                   @if( config('pw-config.vote.arena.status') === true ) checked @endif
                                   @popper({{ __('vote.arena.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('pw-config.vote.arena.status') === true )
                                        {{ __('vote.on') }}
                                    @else
                                        {{ __('vote.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('vote.status') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="arena_username" name="arena_username"
                                                    value="{{ config('pw-config.vote.arena.arena_username') }}"
                                                    placeholder=" " :popover="__('vote.arena.arena_username_desc')"/>
                    <x-hrace009::label for="arena_username">{{ __('vote.arena.arena_username') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-4 w-full group">
                    <div id="type_switch" class="flex ml-20">
                        <div class="pretty p-switch">
                            <input type="radio" id="type" name="type" value="cubi"
                                   @if( config('pw-config.vote.arena.type') === 'cubi' ) checked @endif
                                   @popper({{ __('vote.create.type_cubi_desc') }})/>
                            <div class="state p-info">
                                <label for="type">{{ __('vote.create.type_cubi') }}</label>
                            </div>
                        </div>
                        <div class="pretty p-switch">
                            <input type="radio" id="type" name="type" value="virtual"
                                   @if( config('pw-config.vote.arena.type') === 'virtual' ) checked @endif
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
                                                    value="{{ config('pw-config.vote.arena.reward_amount') }}"
                                                    :popover="__('vote.create.reward_amount_desc')"/>
                    <x-hrace009::label
                        for="reward_amount">{{ __('vote.create.reward_amount') }}</x-hrace009::label>
                </div>

                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

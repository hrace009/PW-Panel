@section('title', ' - ' . __('vote.arena.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('vote.arena.header') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.automate-panel/>
            <x-hrace009::admin.arena-info/>
        </div>
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.vote.arena.submit') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('arena.status') }}"
                                   @if( config('arena.status') === true ) checked @endif
                                @popper({{ __('vote.arena.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('arena.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('arena.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="username" name="username"
                                                        value="{{ config('arena.username') }}"
                                                        placeholder=" " :popover="__('vote.arena.arena_username_desc')"
                                                        required/>
                        <x-hrace009::label for="username">{{ __('vote.arena.arena_username') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="reward" name="reward"
                                                        value="{{ config('arena.reward') }}"
                                                        placeholder=" " :popover="__('vote.arena.reward_desc')"
                                                        required/>
                        <x-hrace009::label for="reward">{{ __('vote.arena.reward') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::select-with-popover id="reward_type" name="reward_type" required
                                                         :popover="__('vote.arena.reward_type_desc')">
                            <option class="dark:text-gray-500"
                                    value=""> -
                            </option>
                            <option class="dark:text-gray-500"
                                    value="bonusess" {{ config('arena.reward_type') === 'bonusess' ? 'selected' : null }}> {{ __('vote.create.type_bonusess') }}
                            </option>
                            <option class="dark:text-gray-500"
                                    value="virtual" {{ config('arena.reward_type') === 'virtual' ? 'selected' : null }}> {{ config('pw-config.currency_name') }}
                            </option>
                            <option class="dark:text-gray-500"
                                    value="cubi" {{ config('arena.reward_type') === 'cubi' ? 'selected' : null }}> {{ __('vote.create.type_cubi') }}
                            </option>
                        </x-hrace009::select-with-popover>
                        <x-hrace009::label for="reward_type">{{ __('vote.arena.reward_type') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="time" name="time"
                                                        value="{{ config('arena.time') }}"
                                                        placeholder=" " :popover="__('vote.arena.time_desc')" required/>
                        <x-hrace009::label for="time">{{ __('vote.arena.time') }}</x-hrace009::label>
                    </div>
                @endif
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

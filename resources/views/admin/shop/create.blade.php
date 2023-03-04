@section('title', ' - ' . __('shop.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('shop.add') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('shop.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{ __('shop.fields.name_desc') }}" id="name" name="name"
                                                    type="text"/>
                    <x-hrace009::label for="name">{{ __('shop.fields.name') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{ __('shop.fields.icon_desc') }}" id="icon" name="icon"
                                                    type="file"/>
                    <x-hrace009::label for="icon">{{ __('shop.fields.icon') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{ __('shop.fields.image_desc') }}" id="image" name="image"
                                                    type="file"/>
                    <x-hrace009::label for="image">{{ __('shop.fields.image') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover
                        popover="{{ __('shop.fields.point_desc') }}"
                        id="point" name="point" type="text"/>
                    <x-hrace009::label
                        for="price">{{ __('shop.fields.point') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover
                        popover="{{ __('shop.fields.price_desc', ['currency' => config('pw-config.currency_name')]) }}"
                        id="price" name="price" type="text"/>
                    <x-hrace009::label
                        for="price">{{ __('shop.fields.price', ['currency' => config('pw-config.currency_name')]) }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{ __('shop.fields.item_id_desc') }}" id="item_id"
                                                    name="item_id" type="text"/>
                    <x-hrace009::label for="item_id">{{ __('shop.fields.item_id') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.octet_desc')}}" id="octet" name="octet"
                                                    type="text"/>
                    <x-hrace009::label for="octet">{{ __('shop.fields.octet') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover popover="{{ __('shop.fields.mask_desc') }}" id="mask" name="mask">
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        @foreach( $masks as $group => $mask )
                            @if( is_array( $mask ) )
                                <optgroup class="dark:text-gray-500" label="{{ $group }}">
                                    @foreach( $mask as $item => $value )
                                        <option class="dark:text-gray-500"
                                                value="{{ $item }}"> {{ $value }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option class="dark:text-gray-500"
                                        value="{{ $group }}"> {{ $mask }}
                                </option>
                            @endif
                        @endforeach
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="mask">{{ __('shop.fields.mask') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.count_desc')}}" id="count" name="count"
                                                    type="text"/>
                    <x-hrace009::label for="count">{{ __('shop.fields.count') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.max_count_desc')}}" id="max_count"
                                                    name="max_count" type="text"/>
                    <x-hrace009::label for="max_count">{{ __('shop.fields.max_count') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.protection_type_desc')}}"
                                                    id="protection_type" name="protection_type" type="text"/>
                    <x-hrace009::label for="protection_type">{{ __('shop.fields.protection_type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.expire_date_desc')}}" id="expire_date"
                                                    name="expire_date" type="text"/>
                    <x-hrace009::label for="expire_date">{{ __('shop.fields.expire_date') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover popover="{{__('shop.fields.discount_desc')}}" id="discount"
                                                    name="discount" type="text"/>
                    <x-hrace009::label for="discount">{{ __('shop.fields.discount') }} %</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <div id="share_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="radio" id="shareable" name="shareable" value="yes"
                                   @popper({{ __('shop.fields.shareable.yes_desc') }})/>
                            <div class="state p-info">
                                <label for="shareable">{{ __('shop.fields.shareable.yes') }}</label>
                            </div>
                        </div>
                        <div class="pretty p-switch">
                            <input type="radio" id="shareable" name="shareable" value="no"
                                   @popper({{ __('shop.fields.shareable.no_desc') }})/>
                            <div class="state p-info">
                                <label for="shareable">{{ __('shop.fields.shareable.no') }}</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="share_switch">{{ __('shop.fields.shareable.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea id="description" name="description" class="description"></textarea>
                </div>
                <x-hrace009::button-with-popover popover="{{ __('shop.create') }}" class="w-auto">
                    {{ __('shop.add_button') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

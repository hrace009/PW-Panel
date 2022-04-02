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
                    <x-hrace009::input id="name" name="name" type="text" required/>
                    <x-hrace009::label for="name">{{ __('shop.fields.name') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="icon" name="icon" type="file"/>
                    <x-hrace009::label for="icon">{{ __('shop.fields.icon') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="image" name="image" type="file"/>
                    <x-hrace009::label for="image">{{ __('shop.fields.image') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="price" name="price" type="number" required/>
                    <x-hrace009::label for="price">{{ __('shop.fields.price') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="item_id" name="item_id" type="number" required/>
                    <x-hrace009::label for="item_id">{{ __('shop.fields.item_id') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="octet" name="octet" type="text" required/>
                    <x-hrace009::label for="octet">{{ __('shop.fields.octet') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="mask" name="mask" required>
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
                    </x-hrace009::select>
                    <x-hrace009::label for="mask">{{ __('shop.fields.mask') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="count" name="count" type="number" required/>
                    <x-hrace009::label for="count">{{ __('shop.fields.count') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="max_count" name="max_count" type="number" required/>
                    <x-hrace009::label for="max_count">{{ __('shop.fields.max_count') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="protection_type" name="protection_type" type="number" required/>
                    <x-hrace009::label for="protection_type">{{ __('shop.fields.protection_type') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="expire_date" name="expire_date" type="number" required/>
                    <x-hrace009::label for="expire_date">{{ __('shop.fields.expire_date') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="discount" name="discount" type="number" required/>
                    <x-hrace009::label for="discount">{{ __('shop.fields.discount') }}%</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <div class="flex">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" id="shareable" name="shareable" value="yes">
                            <span class="ml-2">{{ __('shop.fields.shareable.yes') }}</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" id="shareable" name="shareable" value="no">
                            <span class="ml-2">{{ __('shop.fields.shareable.no') }}</span>
                        </label>
                    </div>
                    <x-hrace009::label for="shareable">{{ __('shop.fields.shareable.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea id="description" name="description" class="description"></textarea>
                </div>
                <x-hrace009::button class="w-auto">
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

@section('title', ' - ' . __('admin.menu.shop'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.shop.create') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('shop.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="author" id="author" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="name" name="name" type="text" required/>
                    <x-hrace009::label for="name">{{ __('admin.shop.itemName') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="price" name="price" type="number" required/>
                    <x-hrace009::label for="price">{{ __('admin.shop.itemPrice') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="item_id" name="item_id" type="number" required/>
                    <x-hrace009::label for="item_id">{{ __('admin.shop.itemID') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="octet" name="octet" type="text" required/>
                    <x-hrace009::label for="octet">{{ __('admin.shop.itemOctets') }}</x-hrace009::label>
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
                    <x-hrace009::label for="mask">{{ __('admin.shop.itemMask') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="count" name="count" type="number" required/>
                    <x-hrace009::label for="count">{{ __('admin.shop.itemCount') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="max_count" name="max_count" type="number" required/>
                    <x-hrace009::label for="max_count">{{ __('admin.shop.itemMaxCount') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="protection_type" name="protection_type" type="number" required/>
                    <x-hrace009::label for="protection_type">{{ __('admin.shop.itemProc') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="expire_date" name="expire_date" type="number" required/>
                    <x-hrace009::label for="expire_date">{{ __('admin.shop.itemExpire') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="discount" name="discount" type="number" required/>
                    <x-hrace009::label for="discount">{{ __('admin.shop.itemDiscount') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <div class="flex">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" id="shareable" name="shareable" value="yes">
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" id="shareable" name="shareable" value="no">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    <x-hrace009::label for="shareable">{{ __('admin.shop.itemShare') }}</x-hrace009::label>
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

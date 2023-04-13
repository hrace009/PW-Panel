@section('title', ' - ' . __('news.title'))
<x-hrace009.layouts.gamemaster>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('news.create') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="author" id="author" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="title" name="title" required
                                                    :popover="__('news.fields.title_desc')"/>
                    <x-hrace009::label for="title">{{ __('news.fields.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover id="category" name="category" required
                                                     :popover="__('news.fields.category_desc')">
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        <option class="dark:text-gray-500"
                                value="update"> {{ __('news.category.update') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="maintenance"> {{ __('news.category.maintenance') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="event"> {{ __('news.category.event') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="contest"> {{ __('news.category.contest') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="download"> {{ __('news.category.download') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="guide"> {{ __('news.category.guide') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="luckybox"> {{ __('news.category.luckybox') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="other"> {{ __('news.category.other') }}
                        </option>
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="category">{{ __('news.fields.category') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="description" name="description" required
                                                    :popover="__('news.fields.desc_desc')"/>
                    <x-hrace009::label for="description">{{ __('news.fields.desc') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="keywords" name="keywords" required
                                                    :popover="__('news.fields.keyword_desc')"/>
                    <x-hrace009::label for="keywords">{{ __('news.fields.keyword') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover id="og_image" name="og_image" type="file"
                                                    :popover="__('news.fields.og_image_desc')"/>
                    <x-hrace009::label for="og_image">{{ __('news.fields.og_image') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea id="content" name="content" class="content"></textarea>
                </div>
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('news.add') }}">
                    {{ __('news.add_button') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.gamemaster>

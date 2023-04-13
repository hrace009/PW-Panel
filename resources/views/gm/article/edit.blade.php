@section('title', ' - ' . __('news.title'))
<x-hrace009.layouts.gamemaster>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('news.edit') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="author" id="author" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover :popover="__('news.fields.title_desc')" id="title" name="title"
                                                    value="{{ $article->title }}" required/>
                    <x-hrace009::label for="title">{{ __('news.fields.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select-with-popover :popover="__('news.fields.category_desc')" id="category"
                                                     name="category" required>
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        <option class="dark:text-gray-500"
                                value="update" {{ $article->category === 'update' ? 'selected' : null }} > {{ __('news.category.update') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="maintenance" {{ $article->category === 'maintenance' ? 'selected' : null }} >
                            {{ __('news.category.maintenance') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="event" {{ $article->category === 'event' ? 'selected' : null }} > {{ __('news.category.event') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="contest" {{ $article->category === 'contest' ? 'selected' : null }} > {{ __('news.category.contest') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="download" {{ $article->category === 'download' ? 'selected' : null }} > {{ __('news.category.download') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="guide" {{ $article->category === 'guide' ? 'selected' : null }} > {{ __('news.category.guide') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="luckybox" {{ $article->category === 'luckybox' ? 'selected' : null }} > {{ __('news.category.luckybox') }}
                        </option>
                        <option class="dark:text-gray-500"
                                value="other" {{ $article->category === 'other' ? 'selected' : null }} > {{ __('news.category.other') }}
                        </option>
                    </x-hrace009::select-with-popover>
                    <x-hrace009::label for="category">{{ __('news.fields.category') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover :popover="__('news.fields.desc_desc')" id="description"
                                                    name="description" value="{{ $article->description }}"
                                                    required/>
                    <x-hrace009::label for="description">{{ __('news.fields.desc') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover :popover="__('news.fields.keyword_desc')" id="keywords"
                                                    name="keywords" value="{{ $article->keywords }}" required/>
                    <x-hrace009::label for="keywords">{{ __('news.fields.keyword') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input-with-popover :popover="__('news.fields.og_image_desc')" id="og_image"
                                                    name="og_image" type="file"/>
                    <x-hrace009::label for="image">{{ __('news.fields.og_image') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea id="content" name="content" class="content">{{ $article->content }}</textarea>
                </div>
                <x-hrace009::button class="w-auto">
                    {{ __('general.update') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.gamemaster>

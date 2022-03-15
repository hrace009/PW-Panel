@section('title', ' - ' . __('admin.menu.news'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.news.edit') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('news.update', $article->id) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="author" id="author" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="title" name="title" value="{{ $article->title }}" required/>
                    <x-hrace009::label for="title">{{ __('admin.news.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="category" name="category" required>
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        <option class="dark:text-gray-500"
                                value="update" {{ $article->category === 'update' ? 'selected' : null }} > Update
                        </option>
                        <option class="dark:text-gray-500"
                                value="maintenance" {{ $article->category === 'maintenance' ? 'selected' : null }} >
                            Maintenance
                        </option>
                        <option class="dark:text-gray-500"
                                value="event" {{ $article->category === 'event' ? 'selected' : null }} > Event
                        </option>
                        <option class="dark:text-gray-500"
                                value="contest" {{ $article->category === 'contest' ? 'selected' : null }} > Contest
                        </option>
                        <option class="dark:text-gray-500"
                                value="other" {{ $article->category === 'other' ? 'selected' : null }} > Other
                        </option>
                    </x-hrace009::select>
                    <x-hrace009::label for="category">{{ __('admin.news.category') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="description" name="description" value="{{ $article->description }}"
                                       required/>
                    <x-hrace009::label for="description">{{ __('admin.news.description') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="keywords" name="keywords" value="{{ $article->keywords }}" required/>
                    <x-hrace009::label for="keywords">{{ __('admin.news.keywords') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="og_image" name="og_image" type="file"/>
                    <x-hrace009::label for="image">{{ __('admin.news.og_image') }}</x-hrace009::label>
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
</x-hrace009.layouts.admin>

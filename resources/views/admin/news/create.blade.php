@section('title', ' - ' . __('admin.menu.news'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.news.create') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-6 ml-6 mr-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="author" id="author" value="{{ Auth::user()->ID }}"/>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="title" name="title" required/>
                    <x-hrace009::label for="title">{{ __('admin.news.title') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::select id="category" name="category" required>
                        <option class="dark:text-gray-500"
                                value=""> -
                        </option>
                        <option class="dark:text-gray-500"
                                value="update"> Update
                        </option>
                        <option class="dark:text-gray-500"
                                value="maintenance"> Maintenance
                        </option>
                        <option class="dark:text-gray-500"
                                value="event"> Event
                        </option>
                        <option class="dark:text-gray-500"
                                value="contest"> Contest
                        </option>
                        <option class="dark:text-gray-500"
                                value="other"> Other
                        </option>
                    </x-hrace009::select>
                    <x-hrace009::label for="category">{{ __('admin.news.category') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="description" name="description" required/>
                    <x-hrace009::label for="description">{{ __('admin.news.description') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="keywords" name="keywords" required/>
                    <x-hrace009::label for="keywords">{{ __('admin.news.keywords') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <x-hrace009::input id="og_image" name="og_image" type="file"/>
                    <x-hrace009::label for="og_image">{{ __('admin.news.og_image') }}</x-hrace009::label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea id="content" name="content" class="content"></textarea>
                </div>
                <x-hrace009::button class="w-auto">
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

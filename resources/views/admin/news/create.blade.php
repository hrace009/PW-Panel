@section('title', ' - ' . __('admin.menu.news'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.news.create') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.postNews') }}">
                {!! csrf_field() !!}
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
                    <textarea id="content" name="content" class="content"></textarea>
                </div>
                <x-hrace009::button class="w-auto">
                    {{ __('general.Save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>

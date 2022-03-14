@section('title', ' - ' . __('admin.menu.news'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('admin.news.view') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach( $news as $article )
            <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-darker mb-6">
                <div class="flex items-center justify-between">
                    <span
                        class="text-sm font-light text-gray-600 dark:text-gray-400">{{ date_format($article->created_at, 'F, j Y, h:m A') }}</span>
                    <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform
                        @if( $article->category === 'update')
                        bg-primary hover:bg-primary-darker
@endif
                    @if( $article->category === 'maintenance')
                        bg-red-700 hover:bg-red-500
@endif
                    @if( $article->category === 'event' )
                        bg-green-700 hover:bg-green-500
@endif
                    @if( $article->category === 'contest' )
                        bg-yellow-700 hover:bg-yellow-500
@endif
                    @if( $article->category === 'other' )
                        bg-blue-700 hover:bg-blue-500
@endif
                        rounded cursor-pointer"
                    >{{ strtoupper($article->category) }}</a>
                </div>

                <div class="mt-2">
                    <a href="#"
                       class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ strtoupper($article->title) }}</a>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $article->description }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>

                    <div class="flex items-center">
                        <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                             src="{{ $user->find($article->author)->profile_photo_url }}"
                             alt="{{ $user->find($article->author)->truename }}">
                        <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ ucwords($user->find($article->author)->truename) }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </x-slot>
</x-hrace009.layouts.admin>

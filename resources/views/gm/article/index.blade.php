@section('title', ' - ' . __('news.title'))
<x-hrace009.layouts.gamemaster>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('news.index') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-auto mt-2 ml-2 mr-2">
            @if( !$news->items() )
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ __('news.noNews') }}</strong>
                    <span class="block sm:inline">{{ __('news.try') }}</span>
                </div>
            @else
                <ul class="max-w-screen-xl px-8 py-4 mx-auto  mb-6 list-none">
                    @foreach( $news as $article )
                        <li class="dark:bg-darker my-2 rounded-lg shadow-lg" x-data="accordion({{$article->id}})">
                            <h2
                                @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                                <span
                                    class="text-sm dark:text-light">#{{ $article->id . ' ' . strtoupper($article->title) }}</span>
                                <div
                                    class="flex flex-row px-3 py-1 justify-between items-center text-sm font-bold text-gray-100 transition-colors duration-200 transform rounded cursor-pointer {{ $article->color($article->category) }}">{{ strtoupper( __('news.category.' . $article->category ) ) }}
                                    <svg
                                        :class="handleRotate()"
                                        class="fill-current h-6 w-6 transform transition-transform duration-500"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                    </svg>
                                </div>
                            </h2>
                            <div
                                x-ref="tab"
                                :style="handleToggle()"
                                class="overflow-hidden max-h-0 duration-500 transition-all"
                            >
                                <div class="p-3">
                                    <img class="flex flex-row rounded-md shadow-lg"
                                         src="{{ asset('uploads/og_image') . '/' . $article->og_image }}"
                                         alt="{{ strtoupper( $article->title ) }}"/>
                                    <div class="flex items-center justify-between dark:text-light mt-1">
                                    <span
                                        class="text-sm font-light">{{ \Carbon\Carbon::parse( $article->created_at)->translatedFormat('j F, Y h:i a') }}</span>
                                    </div>
                                    <a href="#{{ $article->id }}"
                                       class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ strtoupper($article->title) }}</a>
                                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $article->description }}</p>
                                </div>
                                <div class="p-3 flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <x-hrace009::button-with-popover
                                            popover="{{ __('news.edit_desc', ['news' => $article->title ]) }}"
                                            onclick="window.location.href='{{ route('article.edit', $article->id) }}'"
                                            class="mr-2">{{ __('news.edit') }}</x-hrace009::button-with-popover>
                                        <form action="{{ route('article.destroy', $article->id)}}" method="post">
                                            {!! csrf_field() !!}
                                            @method('DELETE')
                                            <x-hrace009::button-with-popover
                                                popover="{{ __('general.delete') }}"
                                                type="submit">{{ __('general.delete') }}</x-hrace009::button-with-popover>
                                        </form>
                                    </div>
                                    <div class="flex items-center">
                                        <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                                             src="{{ $user->find($article->author)->profile_photo_url }}"
                                             alt="{{ $user->find($article->author)->truename }}">
                                        <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ ucwords($user->find($article->author)->truename) }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            {{ $news->links() }}
        </div>
    </x-slot>
</x-hrace009.layouts.gamemaster>

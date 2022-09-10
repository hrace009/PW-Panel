@if( !$news->items() )
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
         role="alert">
        <strong class="font-bold">{{ __('news.noNews') }}</strong>
        <span class="block sm:inline">{{ __('news.try') }}</span>
    </div>
@else
    <ul class="max-w-screen-xl px-8 py-4 mx-auto  mb-6 list-none">
        @foreach( $news as $article )
            <li class="dark:bg-darker my-2 rounded-lg shadow-lg"
                x-data="accordion({{$article->id}})">
                <h2
                    @click="handleClick()"
                    class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                >
                                <span
                                    class="text-sm dark:text-light">{{ strtoupper($article->title) }}</span>
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
                                        class="text-sm font-light">{{ $article->date($article->created_at) }}</span>
                        </div>
                        <div
                            class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ strtoupper($article->title) }}</div>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">{!! $article->description !!}</p>
                    </div>
                    <div class="p-3 flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <div x-data="{ {{ $article->category . $article->id }} : false }">
                                <!-- Button View -->
                                <x-hrace009::button
                                    @click="{{ $article->category . $article->id }} = !{{ $article->category . $article->id }}"
                                    class="w-auto ml-1"
                                >
                                    {{ __('news.readmore') }}
                                </x-hrace009::button>

                                <!-- Modal View News -->
                                <div
                                    x-show="{{ $article->category . $article->id }}"
                                    class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    style="display: none;"
                                >
                                    <!-- Modal -->
                                    <div
                                        x-show="{{ $article->category . $article->id }}"
                                        class="bg-white dark:bg-dark rounded shadow p-6 w-3/4 mx-10 h-4/5 overflow-y-scroll"
                                        @click.away="{{ $article->category . $article->id }} = false"
                                        x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        style="display: none;"
                                    >
                                        <div class="text-xl font-bold">
                                            {{ $article->title }}
                                        </div>
                                        <div class="text-lg">
                                            {!! $article->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img class="hidden object-cover w-10 h-10 rounded-full sm:block"
                                 src="{{ $user->find($article->author)->profile_photo_url }}"
                                 alt="{{ $user->find($article->author)->truename }}">
                            <div
                                class="font-bold text-gray-700 dark:text-gray-200">{{ ucwords($user->find($article->author)->truename) }}</div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif
{{ $news->links() }}

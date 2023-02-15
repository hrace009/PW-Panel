<!-- News links -->
<div x-data="{ isActive: {{ $status }}, open: {{ $status }} }">
    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
    <a
        href="#"
        @click="$event.preventDefault(); open = !open"
        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
        :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
        role="button"
        aria-haspopup="true"
        :aria-expanded="(open || isActive) ? 'true' : 'false'"
    >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v7h4v9a3 3 0 0 1-3 3zm-1-10v7a1 1 0 0 0 2 0v-7h-2zM5 6v6h6V6H5zm0 7v2h10v-2H5zm0 3v2h10v-2H5zm2-8h2v2H7V8z"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('news.title') }} </span>
        <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
    </a>
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('news.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a
            href="{{ route('article.create') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $createText }} transition-colors duration-200 rounded-md dark:{{ $createLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('news.create') }}
        </a>
        <a
            href="{{ route('article.index') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $viewText }} transition-colors duration-200 rounded-md dark:{{ $viewLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('news.view') }}
        </a>
    </div>
</div>

<!-- Members links -->
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
                          d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('chat.title') }} </span>
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
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('chat.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a
            href="{{ route('admin.chat.watch') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textIndex }} transition-colors duration-200 rounded-md dark:{{ $lightIndex }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('manage.watch') }}
        </a>
        <a
            href="{{ route('admin.chat.settings') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textConfig }} transition-colors duration-200 rounded-md dark:{{ $lightConfig }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('chat.config') }}
        </a>
    </div>
</div>

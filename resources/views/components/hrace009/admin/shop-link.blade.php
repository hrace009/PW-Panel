<!-- Shop links -->
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
                          d="M21 13v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-7H2v-2l1-5h18l1 5v2h-1zM5 13v6h14v-6H5zm1 1h8v3H6v-3zM3 3h18v2H3V3z"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('shop.title') }} </span>
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
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a
            href="{{ route('shop.create') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $createText }} transition-colors duration-200 rounded-md dark:{{ $createLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.create') }}
        </a>
        <a
            href="{{ route('shop.index') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $viewText }} transition-colors duration-200 rounded-md dark:{{ $viewLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.view') }}
        </a>
        <a
            href="{{ route('admin.shop.settings') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $settingsText }} transition-colors duration-200 rounded-md dark:{{ $settingsLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.configuration') }}
        </a>
    </div>
</div>

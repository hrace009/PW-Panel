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
                          d="M22 10v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V10h20zm0-2H2V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v4zm-7 8v2h4v-2h-4z"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('donate.title') }} </span>
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
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('donate.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a
            href="{{ route('admin.donate.paypal') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textPaypal }} transition-colors duration-200 rounded-md dark:{{ $lightPaypal }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.paypal.title') }}
        </a>
        <a
            href="{{ route('admin.donate.ipaymu') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textiPaymu }} transition-colors duration-200 rounded-md dark:{{ $lightiPaymu }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.ipaymu.title') }}
        </a>
        <a
            href="{{ route('admin.donate.paymentwall') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textPaymentwall }} transition-colors duration-200 rounded-md dark:{{ $lightPaymentwall }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.paymentwall_title') }}
        </a>
        <a
            href="{{ route('admin.donate.banktransfer') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textBank }} transition-colors duration-200 rounded-md dark:{{ $lightBank }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.bank.title') }}
        </a>
        <a
            href="{{ route('admin.donate.bankconfirm') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textConfirm }} transition-colors duration-200 rounded-md dark:{{ $lightConfirm }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.bank.confirm') }}
        </a>
        <a
            href="{{ route('admin.donate.history') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $textHistory }} transition-colors duration-200 rounded-md dark:{{ $lightHistory }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('donate.history.title') }}
        </a>
    </div>
</div>

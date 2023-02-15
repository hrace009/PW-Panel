<!-- Settings button -->
<button
    onclick="window.location.href='{{ route('gm.dashboard') }}'"
    title="{{ __('general.gmArea') }}"
    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
>
    <span class="sr-only">Open gm panel</span>
    <svg
        class="w-7 h-7"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        aria-hidden="true"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d=""
        />
        <text
            x="0"
            y="16"
        >GM
        </text>
    </svg>
</button>

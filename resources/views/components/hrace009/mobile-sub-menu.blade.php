<!-- Mobile sub menu -->
<nav
    x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
    x-transition:enter-start="-translate-y-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-full opacity-0"
    x-show="isMobileSubMenuOpen"
    @click.away="isMobileSubMenuOpen = false"
    class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
    aria-label="Secondary"
>
    {{ $button }}
</nav>

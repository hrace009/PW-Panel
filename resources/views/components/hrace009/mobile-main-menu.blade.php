<!-- Mobile main menu -->
<div
    class="border-b md:hidden dark:border-primary-darker"
    x-show="isMobileMainMenuOpen"
    @click.away="isMobileMainMenuOpen = false"
>
    <nav aria-label="Main" class="px-2 py-4 space-y-2">
        {{ $links }}
    </nav>
</div>

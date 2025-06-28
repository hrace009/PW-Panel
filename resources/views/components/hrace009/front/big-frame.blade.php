<div x-data="setup()" x-init="loadingState = false; setColors(color);" :class="{ 'dark': isDark}">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        {{ $slot }}
    </div>
</div>

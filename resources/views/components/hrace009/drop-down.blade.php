<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
            type="button"
            aria-haspopup="true"
            :aria-expanded="open ? 'true' : 'false'"
            class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
        {{ $trigger }}
    </button>

    <div x-show="open"
         x-ref="userMenu"
         x-transition:enter="transition-all transform ease-out"
         x-transition:enter-start="translate-y-1/2 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition-all transform ease-in"
         x-transition:leave-start="translate-y-0 opacity-100"
         x-transition:leave-end="translate-y-1/2 opacity-0"
         @click.away="open = false"
         @keydown.escape="open = false"
         class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
         tabindex="-1"
         role="menu"
         aria-orientation="vertical"
         aria-label="User menu"
    >
        {{ $content }}
    </div>
</div>

<a {{ $attributes->merge([
    'class' => 'block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary',
    'role' => 'menuitem']) }}>{{ $slot }}</a>

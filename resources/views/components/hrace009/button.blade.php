<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker']) }}>
    {{ $slot }}
</button>

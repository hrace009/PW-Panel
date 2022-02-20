@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-light dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer']) !!}>
    {{ $slot }}
</select>

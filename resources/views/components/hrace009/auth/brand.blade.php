<div>
    {{ $logo }}
</div>
<a
    href="{{ config('app.url') }}"
    class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
>
    {{ $slot }}
</a>

<div
    x-ref="loading"
    x-show="loadingState"
    class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
    style="display: none;"
>
    {{ $slot }}
</div>

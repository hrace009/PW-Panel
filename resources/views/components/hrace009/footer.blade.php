<!-- Main footer -->
<footer
    class="flex-shrink-0 flex items-center justify-between sticky bottom-0 z-10 p-4 bg-white border-t dark:bg-darker dark:border-primary-darker"
>
    <div>Copyright © <span id="get-current-year"></span> <a href="{{ route('HOME') }}" target="_blank"
                                                            class="text-blue-500 hover:underline"
        >{{ config('pw-config.server_name') }}
        </a></div>
    <div>
        {{ __('Made with') }} &#10084; {{ __('By') }}
        <a href="https://www.youtube.com/hrace009" target="_blank" class="text-blue-500 hover:underline"
        ><span id="copyright-by"></span>
        </a>
    </div>
    <div>
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</footer>

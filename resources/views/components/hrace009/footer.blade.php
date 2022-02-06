<!-- Main footer -->
<footer
    class="flex items-center justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker"
>
    <div>Copyright © <span id="get-current-year"></span> <a href="{{ route('HOME') }}" target="_blank"
                                                            class="text-blue-500 hover:underline"
        >{{ config('app.name') }}
        </a></div>
    <div>
        <!--
        If you respect my work, please keep this footer like this. I will really appreciate when you do that.
        Thanks
        -->
        {{ __('Made with') }} <i class="ri-heart-fill"></i> {{ __('By') }}
        <a href="https://www.youtube.com/hrace009" target="_blank" class="text-blue-500 hover:underline"
        ><span id="copyright-by"></span>
        </a>
    </div>
</footer>

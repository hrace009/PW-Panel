<!-- Footer -->
<footer class="youplay-footer youplay-footer-parallax">

    <div class="image" data-speed="0.4" data-img-position="50% 0%">
        <img src="{{ asset('img/bg/footer.jpg') }}" alt="" class="jarallax-img">
    </div>


    <div class="wrapper">




        <!-- Social Buttons -->
        <div class="social">
            <div class="container">
                <h3>Connect socially with <strong>{{ config('pw-config.server_name') }}</strong></h3>

                <div class="social-icons">
                    <div class="social-icon">
                        <a href="https://youtube.com/c/hrace009">
                            <i class="fab fa-youtube"></i>
                            <span>Watch on Youtube</span>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://twitter.com/hrace009">
                            <i class="fab fa-twitter-square"></i>
                            <span>Follow on Twitter</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Social Buttons -->



        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <p>{{ date('Y') }} &copy; <strong>{{ config('pw-config.server_name') }}</strong>. All rights reserved</p>
                <p>{{ __('Made with') }} &#10084; {{ __('By') }} <a href="https://www.youtube.com/hrace009" target="_blank" class="text-blue-500 hover:underline"
                    >Harris Marfel</a></p>
            </div>
        </div>
        <!-- /Copyright -->

    </div>
</footer>
<!-- /Footer -->

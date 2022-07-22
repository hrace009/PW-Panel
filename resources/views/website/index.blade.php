<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('pw-config.server_name') }}</title>
    <meta name="description" content="PW Panel develop by hrae009 (Harris Marfel)"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add site Favicon -->
    @if( config('pw-config.logo') === 'img/logo/logo.png' )
        <link rel="shortcut icon" type="image/png" href="{{ asset(config('pw-config.logo')) }}"/>
        <link
            rel="apple-touch-icon"
            type="image/png"
            sizes="76x76"
            href="{{ asset(config('pw-config.logo')) }}"
        />
    @else
        <link rel="shortcut icon" type="image/png" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"/>
        <link
            rel="apple-touch-icon"
            type="image/png"
            sizes="76x76"
            href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"
        />
    @endif

    <!-- CSS
    ========================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Metal+Mania&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
</head>
<body class="body__bg" data-bgimg="{{ asset('template/img/bg/body-bg2.webp') }}">
<!--offcanvas menu area start-->
<div class="body_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icofont-close"></i></a>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="{{ route('HOME') }}">{{ __('website.home') }}</a>
                            </li>
                            <!--- Remove Start --->
                            <!--
                                <li class="menu-item-has-children"><a href="#">Match</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('HOME') }}">Match Page</a></li>
                                        <li><a href="{{ route('HOME') }}">Match Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="all-game.html">All Game</a></li>
                                        <li><a href="game-details.html">Game Details</a></li>
                                        <li><a href="faq.html">Faq Page</a></li>
                                        <li><a href="players.html">Players</a></li>
                                        <li><a href="player-details.html">Player Details</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-without-sidebar.html">Blog Without Sidebar</a></li>
                                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                        <li><a href="blog-grid-without-sidebar.html">Blog Grid Without Sidebar</a></li>
                                        <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                        <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="contact.html">Contact Us</a></li>
                                -->
                            <!--- Remove End --->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<!--header area start-->
<header class="header_section header_transparent sticky-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        @if( config('pw-config.logo') === 'img/logo/logo.png' )
                            <a class="sticky_none" href="{{ route('HOME') }}"><img width="80px" height="80px"
                                                                                   src="{{ asset(config('pw-config.logo')) }}"
                                                                                   alt=""></a>
                        @else
                            <a class="sticky_none" href="{{ route('HOME') }}"><img width="80px" height="80px"
                                                                                   src="{{ asset('uploads/logo/' . config('pw-config.logo')) }}"
                                                                                   alt=""></a>
                        @endif
                    </div>
                    <!--main menu start-->
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex">
                                <li><a href="{{ route('HOME') }}">Home</a></li>
                                <!--- Remove Start --->
                                <!--
                                <li><a href="match.html">Match</a>
                                    <ul class="sub_menu">
                                        <li><a href="match.html">Match Page</a></li>
                                        <li><a href="match-details.html">Match Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul class="sub_menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="all-game.html">All Game</a></li>
                                        <li><a href="game-details.html">Game Details</a></li>
                                        <li><a href="faq.html">Faq Page</a></li>
                                        <li><a href="players.html">Players</a></li>
                                        <li><a href="player-details.html">Player Details</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-left-sidebar.html">blog</a>
                                    <ul class="sub_menu">
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-without-sidebar.html">Blog Without Sidebar</a></li>
                                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                        <li><a href="blog-grid-without-sidebar.html">Blog Grid Without Sidebar</a></li>
                                        <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                        <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                                -->
                                <!--- Remove End --->
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                    <!--User Navigation Start-->
                    <div class="header_right_sidebar d-flex align-items-center">
                        @if (Route::has('login'))
                            @auth()
                                <div class="sing_up_btn">
                                    <a class="btn btn-link"
                                       href="{{ route('app.dashboard') }}">{{ __('general.menu.dashboard') }}</a>
                                </div>
                                <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a>
                                </div>
                            @else
                                <div class="sing_up_btn p-2">
                                    <a class="btn btn-link" href="{{ route('login') }}">{{ __('auth.form.login') }}</a>
                                </div>
                                <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a>
                                </div>
                                @if (Route::has('register'))
                                    <div class="sing_up_btn">
                                        <a class="btn btn-link"
                                           href="{{ route('register') }}">{{ __('auth.form.register') }}</a>
                                    </div>
                                    <div class="canvas_open">
                                        <a href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a>
                                    </div>
                                @endif
                            @endauth
                        @endif
                    </div>
                    <!--User Navigation end-->
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->

<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-140" data-bgimg="assets/img/bg/breadcrumbs-bg.webp">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text text-center">
                    <h1>{{ config('pw-config.server_name') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- page wrapper start -->
<div class="page_wrapper">

    <!-- blog page section start -->
    <section class="blog_page_section mb-140">
        <div class="container">
            <div class="row">

                <!-- List Blog Start -->
                <div class="col-lg-8">
                    <div class="blog_page_wrapper">
                        <div class="blog_page_inner">
                            <div class="single_blog d-flex align-items-center">
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{ asset('template/img/blog/blog1.webp') }}"
                                                                     alt=""></a>
                                </div>
                                <div class="blog_content">
                                    <div class="blog_date">
                                        <span><i class="icofont-calendar"></i>  20 January 2021</span>
                                    </div>
                                    <h3><a href="blog-details.html">It long established fact that reader
                                            distracted the readable.</a></h3>
                                    <a href="blog-details.html">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination pagination_pages">
                        <ul>
                            <li class="current"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li class="next"><a href="#"><i class="icofont-rounded-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- List Blog End -->

                <!-- Side Bar Start -->
                <div class="col-lg-4">
                    <div class="blog_sidebar blog_widget">
                        <div class="blog_widget_list mb-50">
                            <h3>{{ __('widget.table.server_status') }}</h3>
                            Server status here
                        </div>
                    </div>
                </div>
                <!-- Side Bar End -->

            </div>
        </div>
    </section>
    <!-- blog page section end -->

</div>
<!-- page wrapper end -->

<!--footer area start-->
<footer class="footer_widgets">
    <div class="main_footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_footer_inner d-flex">
                        <div class="footer_widget_list">
                            <div class="footer_logo">
                                @if( config('pw-config.logo') === 'img/logo/logo.png' )
                                    <a href="#"><img width="80px" height="80px"
                                                     src="{{ asset( config('pw-config.logo') ) }}" alt=""></a>
                                @else
                                    <a href="#"><img width="80px" height="80px"
                                                     src="{{ asset('uploads/logo/' . config('pw-config.logo')) }}"
                                                     alt=""></a>
                                @endif
                            </div>
                            <div class="footer_contact_desc">
                                <p>It long estabhed fact that reader
                                    will ditracted the readable content
                                    looking using readable.</p>
                            </div>
                            <div class="footer_social">
                                <ul class="d-flex">
                                    <li><a class="facebook" href="https://www.facebook.com"><i
                                                class="icofont-facebook"></i></a></li>
                                    <li><a class="dribbble" href="https://dribbble.com"><i class="icofont-dribbble"></i></a>
                                    </li>
                                    <li><a class="youtube" href="https://www.youtube.com"><i
                                                class="icofont-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="https://twitter.com"><i
                                                class="icofont-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer_widget_list contact">
                            <h3>{{ __('website.contact') }}</h3>
                            <div class="footer_contact_info">
                                <div class="footer_contact_info_list">
                                    <span>{{ __('website.location') }}:</span>
                                    <p>This field should input from admin area</p>
                                </div>
                                <div class="footer_contact_info_list">
                                    <span>{{ __('website.phone') }}:</span>
                                    <p><a href="#">Enter phone number from admin area</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer_bottom_inner d-flex justify-content-between">
                        <div class="copyright_right">
                            <p> © {{ now()->year }} <a href="{{ route('HOME') }}" target="_blank"
                                >{{ config('pw-config.server_name') }}
                                </a> {{ __('website.made') }} <i class="icofont-heart"></i> {{ __('website.by') }} <a
                                    target="_blank" href="https://www.youtube.com/hrace009">Harris Marfel</a></p>
                        </div>

                        <div class="footer_bottom_link_menu">
                            <ul class="d-flex">
                                <li><a href="{{ route('terms.show') }}">{{ __('website.term') }}</a></li>
                                <li><a href="{{ route('policy.show') }}">{{ __('website.privacy') }}</a></li>
                            </ul>
                        </div>
                        <div class="scroll__top_icon">
                            <a id="scroll-top" href="#"><img src="{{ asset('template/img/icon/scroll-top.webp') }}"
                                                             alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- JS
============================================ -->
<!--modernizr min js here-->
<script src="template/js/vendor/modernizr-3.7.1.min.js"></script>

<!-- Vendor JS -->
<script src="{{ asset('template/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('template/js/vendor/popper.js') }}"></script>
<script src="{{ asset('template/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/slick.min.js') }}"></script>
<script src="{{ asset('template/js/wow.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('template/js/jquery-waypoints.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('template/js/main.js') }}"></script>
</body>
</html>

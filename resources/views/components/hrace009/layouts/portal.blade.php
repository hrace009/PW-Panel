<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{  config('pw-config.server_name', 'Laravel')  }} @yield('title')</title>
    <meta name="description" content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}">
    <meta name="keywords" content="gaming, game, mmorpg, perfect world, private server">
    <meta name="author" content="{{ config('pw-config.server_name') }}">

    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:title" content="{{ config('pw-config.server_name', 'Laravel') }}">
    <meta property="og:url" content="{{ route('HOME') }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}">
    <meta property="og:image" content="{{ asset('img/bg/header.jpg') }}">

    <meta name="twitter:card" content="summary" >
    <meta name="twitter:title" content="{{ config('pw-config.server_name', 'Laravel') }}" >
    <meta name='twitter:description' content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}" >
    <meta name="twitter:url" content="{{ route('HOME') }}" >
    <meta name="twitter:image" content="{{ asset('img/bg/header.jpg') }}" >

    @if( config('pw-config.logo') === 'img/logo/logo.png' )
        <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset(config('pw-config.logo')) }}"
        />
    @elseif( ! config('pw-config.logo') )
        <link rel="shortcut icon" href="{{ asset('img/logo/logo.png') }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('img/logo/logo.png') }}"
        />
    @else
        <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"
        />
    @endif
    <x-hrace009::portal.top-script/>
</head>


<body>

<x-hrace009::portal.preload />

<x-hrace009::portal.navbar />

<div class="content-wrap">

    <section class="youplay-banner banner-top youplay-banner-parallax small">

        <div class="image" data-speed="0.4">
            <img src="{{ asset('img/bg/header.jpg') }}" alt="{{ config('pw-config.server_name') }}" class="jarallax-img">
        </div>


        <div class="info">
            <div>
                <div class="container">


                    <h1 class="h1">{{ config('pw-config.server_name') }}</h1>



                </div>
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <div class="container youplay-news">

        <!-- News List -->
        <div class="col-md-9">

            {{ $news }}

        </div>
        <!-- /News List -->

        <!-- Right Side -->
        <div class="col-md-3">

            {{ $widget }}

        </div>
        <!-- /Right Side -->

    </div>



<x-hrace009::portal.footer />


</div>





<x-hrace009::portal.bottom-script />



</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description  }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="{{ $author  }}">

    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:url" content="{{ $og_url }}">
    <meta property="og:type" content="blog">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $og_image }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name='twitter:description' content="{{ $description }}">
    <meta name="twitter:url" content="{{ $og_url }}">
    <meta name="twitter:image" content="{{ $og_image }}">

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

<x-hrace009::portal.preload/>

<x-hrace009::portal.navbar/>

<div class="content-wrap">

    <section class="youplay-banner banner-top youplay-banner-parallax small">

        <div class="image" data-speed="0.4">
            <img src="{{ $og_image }}" alt="{{ $title }}" class="jarallax-img">
        </div>


        <div class="info">
            <div>
                <div class="container">


                    <h1 class="h1">{{ $article_title }}</h1>


                </div>
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <div class="container youplay-news">

        <!-- News List -->
        <div class="col-md-9">
            <article class="news-one">
                <div class="tags">
                    @php($tags = explode(',', $keywords ))
                    <i class="fa fa-tags"></i>
                    @foreach( $tags as $tag )
                        <a href="#">{{ $tag }}</a>{{ $loop->last ? '' : ', ' }}
                    @endforeach
                </div>
                <div class="meta">
                    <div class="item">
                        <i class="fa fa-user meta-icon"></i>
                        By: {{ $author  }}
                    </div>
                    <div class="item">
                        <i class="fa fa-calendar meta-icon"></i>
                        Published {{ $published }}
                    </div>
                    <div class="item">
                        <i class="fa fa-bookmark meta-icon"></i>
                        {{ $categories }}
                    </div>
                </div>
                <div class="description">
                    {{ $news }}
                </div>
                <!-- Post Share -->
                <div class="btn-group social-list social-likes" data-url="{{ route('show.article', $article_id ) }}"
                     data-counters="no">
                    <span class="btn btn-default facebook" title="Share link on Facebook"></span>
                    <span class="btn btn-default twitter" title="Share link on Twitter"></span>
                </div>
                <!-- /Post Share -->
            </article>

        </div>
        <!-- /News List -->

        <!-- Right Side -->
        <div class="col-md-3">

            {{ $widget }}

        </div>
        <!-- /Right Side -->

    </div>


    <x-hrace009::portal.footer/>


</div>


<x-hrace009::portal.bottom-script/>


</body>
</html>

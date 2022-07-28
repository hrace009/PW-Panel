<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @if( config('pw-config.logo') === 'img/logo/logo.png' )
        <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset(config('pw-config.logo')) }}"
        />
    @else
        <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"/>
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}"
        />
    @endif
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Open Sans, Geneva, sans-serif;
            font-size: 12px;
            color: #000;
            font-weight: normal;
            background-color: #000;
            min-height: 100%;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        html, body, div, .hover-effect {
            margin: 0;
            border: 0 none;
            padding: 0;
        }

        html, body, #container, #register, #login, .hover-effect {
            height: 100%;
            min-height: 100%;
        }

        #container {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            text-align: left;
        }

        #register {
            float: left;
            width: 50%;
            min-height: 100%;
            margin: auto;
            text-align: right;
            position: relative;
        }

        #login {
            text-align: left;
            float: left;
            width: 50%;
            min-height: 100%;
            margin: auto;
            position: relative;
        }

        img {
            z-index: 1;
            width: 100%;
            border: 0;
            min-width: 800px;
            position: absolute;
            top: 0;
            left: 0;
            transform: scale(1, 1);
            -ms-transform: scale(1, 1); /* IE 9 */
            -webkit-transform: scale(1, 1); /* Safari and Chrome */
            -o-transform: scale(1, 1); /* Opera */
            -moz-transform: scale(1, 1); /* Firefox */

            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
        }

        a.link {
            z-index: 10;
            overflow: hidden;
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.3;
            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
        }

        a.link:hover {
            opacity: 1;
            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 0px;
            z-index: 999;
            width: 100%;
            text-align: center;
            padding: 20px;
            background: black;
            margin: 0px 0px 0px 0px;
            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
        }

        .content:hover .link {
            opacity: 1;
            z-index: 1;

        }


        .content:hover .link img {
            transform: scale(1.03, 1.03);
            -ms-transform: scale(1.03, 1.03); /* IE 9 */
            -webkit-transform: scale(1.03, 1.03); /* Safari and Chrome */
            -o-transform: scale(1.03, 1.03); /* Opera */
            -moz-transform: scale(1.03, 1.03); /* Firefox */

            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
        }

        .content:hover .text {
            color: #fff;
        }


        a.text {
            text-shadow: 0px 2px 1px rgba(0, 0, 0, 1);
            font-family: 'Oswald', Helvetica, Arial, sans-serif;
            display: block;
            font-size: 60px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
        }

        .blue {
            color: #25d2fe;
        }

        .red {
            color: #ff2a2a;
        }

        a.text:hover {
            color: #fff;
            transition: all 0.35s ease-in-out;
            /* Firefox 4 */
            -moz-transition: all 0.35s ease-in-out;
            /* Safari and Chrome */
            -webkit-transition: all 0.35s ease-in-out;
            /* Opera */
            -o-transition: all 0.35s ease-in-out;
            text-decoration: none;
        }

        .clearfloat {
            clear: both;
            height: 0;
            font-size: 1px;
            line-height: 0px;
        }
    </style>
</head>

<body>
<div id="container">
    <div id="register">
        <div class="content">
            {{ $register }}
        </div>
    </div>

    <div id="login">
        <div class="content">
            {{ $login }}
        </div>
    </div>
    <div class="clearfloat"></div>
</div>
</body>
</html>

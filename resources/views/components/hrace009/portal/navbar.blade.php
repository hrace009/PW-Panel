<!-- Navbar -->
<nav class="navbar-youplay navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route('HOME') }}">
                @if( config('pw-config.logo') === 'img/logo/logo.png' )
                    <img src="{{ asset(config('pw-config.logo')) }}" width="48px" height="48px" alt="{{ config('pw-config.server_name') }}">
                @elseif( ! config('pw-config.logo') )
                    <img src="{{ asset('img/logo/logo.png') }}" width="48px" height="48px" alt="{{ config('pw-config.server_name') }}">
                @else
                    <img src="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" width="48px" height="48px" alt="{{ config('pw-config.server_name') }}">
                @endif
                    <span style="color: white;">{{ config('pw-config.server_name') }}</span>
            </a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ (Route::is('HOME')) ? 'active' : ''  }}">
                    <a href="{{ route('HOME') }}" >
                        {{ __('general.home') }}
                    </a>
                </li>
                @if( config('pw-config.system.apps.shop')  )
                    <li>
                        <a href="{{ route('app.shop.index') }}" >
                            {{ __('shop.title') }}
                        </a>
                    </li>
                @endif
                @if( config('pw-config.system.apps.donate') )
                    <li>
                        <a href="{{ route('app.donate.history') }}" >
                            {{ __('donate.title') }}
                        </a>
                    </li>
                @endif
                @if( config('pw-config.system.apps.voucher') )
                    <li>
                        <a href="{{ route('app.voucher.index') }}" >
                            {{ __('voucher.title') }}
                        </a>
                    </li>
                @endif
                @if( config('pw-config.system.apps.inGameService') )
                    <li>
                        <a href="{{ route('app.services.index') }}" >
                            {{ __('service.title') }}
                        </a>
                    </li>
                @endif
                @if( config('pw-config.system.apps.ranking') )
                    <li>
                        <a href="{{ route('app.ranking.index') }}" >
                            {{ __('ranking.title') }}
                        </a>
                    </li>
                @endif
                @if( config('pw-config.system.apps.vote') )
                    <li>
                        <a href="{{ route('app.vote.index') }}" >
                            {{ __('vote.title') }}
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth()

                        <li class="dropdown dropdown-hover">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->truename }}
                                <img class="img-circle" width="32px" height="32" src="{{ Auth::user()->profile_photo_url }}"
                                     alt="{{ Auth::user()->name }}"/>
                            </a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->truename }}
                                    <i class="fa fa-chevron-circle-down"></i>
                                </a>
                            @endif
                            <div class="dropdown-menu">
                                <ul role="menu">
                                    <li>
                                        <a href="{{ route('app.dashboard') }}">
                                            {{ __('general.menu.dashboard') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.show') }}">
                                            {{ __('general.dashboard.profile.header') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('app.donate.history') }}">
                                            {{ __('general.menu.donate.history') }}
                                        </a>
                                    </li>
                                    <li>
                                        <form style="margin-top: 10px !important; margin-left: 25px !important;" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('general.logout') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                @else
                    <li class="dropdown dropdown-hover dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            <i class="fa fa-user"></i>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                            <form class="navbar-login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="name">{{ __('auth.form.login') }}:</label>
                                <div class="youplay-input">
                                    <input id="name" type="text" name="name" />
                                </div>

                                <label for="password">{{ __('auth.form.password') }}:</label>
                                <div class="youplay-input">
                                    <input id="password" type="password" name="password" />
                                </div>

                                @if (! Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                                    <label for="pin">{{ __('auth.form.pin') }}:</label>
                                    <div class="youplay-input">
                                        <input id="pin" type="password" name="pin" required
                                               autocomplete="current-pin" />
                                    </div>
                                @endif

                                @if( config('pw-config.system.apps.captcha') )
                                    @captcha
                                    <label for="captcha">{{ __('captcha.enter_code') }}:</label>
                                    <div class="youplay-input">
                                        <input id="captcha" type="text" name="captcha" required
                                               autocomplete="current-pin" />
                                    </div>
                                @endif

                                <div class="youplay-checkbox mb-15 ml-5">
                                    <input type="checkbox" name="remember" value="forever" id="remember_me">
                                    <label for="remember_me">{{ __('auth.form.remember') }}</label>
                                </div>

                                <button class="btn btn-sm ml-0 mr-0" name="submit">{{ __('auth.form.login') }}</button>
                                <br>

                                <p>
                                    <a class="no-fade" href="{{ route('password.request') }}">{{ __('auth.form.forgotPassword') }}</a> | <a class="no-fade" href="{{ route('register') }}" >{{ __('auth.form.register') }}</a>
                                </p>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->

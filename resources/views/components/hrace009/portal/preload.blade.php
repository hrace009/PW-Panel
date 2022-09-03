<!-- Preloader -->
<div class="page-preloader preloader-wrapp">
    @if( config('pw-config.logo') === 'img/logo/logo.png' )
        <img src="{{ asset(config('pw-config.logo')) }}" alt="{{ config('pw-config.server_name') }}">
    @elseif( ! config('pw-config.logo') )
        <img src="{{ asset('img/logo/logo.png') }}" alt="{{ config('pw-config.server_name') }}">
    @else
        <img src="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" alt="{{ config('pw-config.server_name') }}">
    @endif
    <div class="preloader"></div>
</div>
<!-- /Preloader -->

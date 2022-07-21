@if( config('pw-config.logo') === 'img/logo/logo.png' )
    <img width="128px" height="128px" src="{{ asset(config('pw-config.logo')) }}" {{ $attributes }}>
@else
    <img width="128px" height="128px" src="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" {{ $attributes }}>
@endif

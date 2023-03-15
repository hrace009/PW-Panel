<x-hrace009::pixel/>
<!-- Fonts -->
<link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
    rel="stylesheet"
/>
<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

@if( request()->routeIs('news.create') || request()->routeIs('news.edit') || request()->routeIs('shop.create') || request()->routeIs('shop.edit') || request()->routeIs('article.create') || request()->routeIs('article.edit') )
    <script src="{{ asset('vendor/tinymce/tinymce.js') }}"></script>
@endif

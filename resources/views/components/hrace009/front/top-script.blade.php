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

@if( request()->routeIs('admin.createNews') )
    <script src="{{ asset('vendor/tinymce/tinymce.js') }}"></script>
@endif

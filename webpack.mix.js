

const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .sass('resources/sass/app.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
}
mix.copyDirectory('node_modules/tinymce/icons', 'public/vendor/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/vendor/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/vendor/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/vendor/tinymce/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/vendor/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/vendor/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/vendor/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/vendor/tinymce/tinymce.min.js');

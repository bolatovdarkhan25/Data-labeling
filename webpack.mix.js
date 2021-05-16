const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css/admin');

mix.copyDirectory('resources/js/admin', 'public/js/admin');
mix.copyDirectory('resources/css/admin', 'public/css/admin');
mix.copyDirectory('resources/css/fonts', 'public/css/fonts');

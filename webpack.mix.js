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

mix.js(['resources/js/app.js', 'public/assets/js/main.js'], 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

//     mix.js(['resources/js/app.js', 'public/assets/js/app.js', 'public/assets/js/jquery.slimscroll.js'], 'public/js')
// mix.styles('public/assets/css/style.css', 'public/css/all.css');

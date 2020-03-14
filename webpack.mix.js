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
    .sass('resources/sass/auth.scss', 'public/css/auth.css')
	.sass('resources/sass/homepage.sass', 'public/css/homepage.css')
	.sass('resources/sass/responsive.sass', 'public/css/responsive.css');

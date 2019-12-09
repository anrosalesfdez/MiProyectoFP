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
   .sass('resources/sass/app.scss', 'public/css')
   mix.styles([
      'public/css/gijgo.css',
      'public/css/magnific-popup.css',
      'public/css/nice-select.css',
      'public/css/slick.css',
      'public/css/slicknav.css',
      'public/css/style.css',
      'public/css/theme-default.css'
  ], 'public/css/all.css')
;

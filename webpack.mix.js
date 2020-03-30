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

mix.js('resources/js/bootstrap.js', 'public/js')
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
   		'public/assets/css/*'
   	], 'public/css/main.css')
   .styles([
   		'public/dist/css/adminlte.min.css',
   		'public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
   		'public/plugins/fontawesome-free/css/all.min.css',
   		'public/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
   		'public/plugins/jqvmap/jqvmap.min.css',
   		'public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
   		'public/plugins/daterangepicker/daterangepicker.css',
   		'public/plugins/summernote/summernote-bs4.css'
   	], 'public/css/admin.css');
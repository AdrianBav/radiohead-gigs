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

mix
    .styles([
        'resources/vendors/bootstrap/dist/css/bootstrap.css',
        'resources/vendors/font-awesome/css/font-awesome.css',
        'resources/vendors/nprogress/nprogress.css',
        'resources/vendors/jqvmap/dist/jqvmap.css',
        'resources/css/custom.css',
    ], 'public/css/app.css');


mix
    .scripts([
        'resources/vendors/jquery/dist/jquery.js',
        'resources/vendors/bootstrap/dist/js/bootstrap.js',
        'resources/vendors/fastclick/lib/fastclick.js',
        'resources/vendors/nprogress/nprogress.js',
        'resources/vendors/bootstrap-progressbar/bootstrap-progressbar.js',
        'resources/vendors/jqvmap/dist/jquery.vmap.js',
        'resources/vendors/jqvmap/dist/maps/jquery.vmap.world.js',
        'resources/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js',
    ], 'public/js/vendor.js')
    .js('resources/js/app.js', 'public/js')


mix
    .copyDirectory('resources/vendors/font-awesome/fonts', 'public/fonts')
    .copyDirectory('resources/images', 'public/images');

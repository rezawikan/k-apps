let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    'resources/assets/css/bootstrap.min.css',
  ], 'public/css/bootstrap.min.css')
  .styles([
    'resources/assets/font-awesome/css/font-awesome.min.css',
  ], 'public/font-awesome/css/font-awesome.min.css')
  .styles([
    'resources/assets/css/animate.css',
  ], 'public/css/animate.min.css')
  .styles([
    'resources/assets/css/style.css',
  ], 'public/css/style.min.css')
  // .scripts([
  //   'resources/assets/js/jquery-3.1.1.min.js',
  // ], 'public/js/jquery-3.1.1.min.js')
  // .scripts([
  //   'resources/assets/js/bootstrap.js',
  // ], 'public/js/bootstrap.min.js')
  .scripts([
    'resources/assets/js/plugins/metisMenu/jquery.metisMenu.js',
  ], 'public/js/plugins/metisMenu/jquery.metisMenu.min.js')
  .scripts([
    'resources/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
  ], 'public/js/plugins/slimscroll/jquery.slimscroll.min.js')
  .scripts([
    'resources/assets/js/inspinia.js',
  ], 'public/js/inspinia.min.js')
  .scripts([
    'resources/assets/js/plugins/pace/pace.min.js',
  ], 'public/js/plugins/pace/pace.min.js')
  .scripts([
    'resources/assets/js/plugins/pace/pace.min.js',
  ], 'public/js/plugins/pace/pace.min.js')
mix.copyDirectory('resources/assets/font-awesome/fonts', 'public/font-awesome/fonts')
mix.copyDirectory('resources/assets/img', 'public/img')
mix.copyDirectory('resources/assets/css/patterns', 'public/css/patterns')
  .options({
    processCssUrls: false
  });

const elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.browserSync({
      proxy: 'horws.app'
    });
    mix.sass('public.scss', 'public/css/public.css');
    mix.scripts([
      'vendor/jquery/jquery-3.1.1.min.js',
      'vendor/semanticui/semantic.min.js',
      'vendor/dropzone/dropzone.js',
      'admin.js'
    ], 'public/js/admin-bundle.js');
    mix.scripts([
      'vendor/jquery/jquery-3.1.1.min.js',
      'public.js'
    ], 'public/js/public-bundle.js');
});

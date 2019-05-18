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

//https://laravel-mix.com/docs/4.0/copying-files
// mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

//https://laravel-mix.com/docs/4.0/css-preprocessors
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/bulma.scss', 'public/css')
   .js('resources/js/bulma.js', 'public/js');


if (mix.inProduction()) {
   mix.version();
}


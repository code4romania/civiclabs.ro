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

mix.webpackConfig({
    devtool: mix.config.production ? 'none' : 'source-map'
});

if (mix.config.production) {
    mix.version();
}

mix.setPublicPath('public/assets')
    .setResourceRoot('./');

mix.js('resources/assets/js/app.js', 'public/assets')
    .extract();

mix.sass('resources/assets/sass/app.scss', 'public/assets')
    .options({
        clearConsole: true,
        // purifyCss: !!mix.config.production && {
        //     purifyOptions: {
        //         minify: mix.config.production,
        //         whitelist: [],
        //     },
        // },
    });

mix.copyDirectory('resources/assets/favicons', 'public/assets/favicons');
mix.copyDirectory('resources/assets/images', 'public/assets/images');
mix.copyDirectory('resources/assets/js/polyfills', 'public/assets/polyfills');

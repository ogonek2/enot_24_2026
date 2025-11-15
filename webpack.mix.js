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
    .vue({ 
        version: 2,
        runtimeOnly: false // Используем полную версию Vue с компилятором
    })
    .webpackConfig({
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.js' // Используем полную версию с компилятором (CommonJS)
            }
        }
    })
    // Компиляция Tailwind CSS через PostCSS
    .postCss('resources/css/tailwind.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/content.scss', 'public/css')
    .sass('resources/sass/windows.scss', 'public/css')
    .sass('resources/sass/elements.scss', 'public/css')
    .sass('resources/sass/fixed_elements.scss', 'public/css')
    .sass('resources/sass/box_containers.scss', 'public/css');

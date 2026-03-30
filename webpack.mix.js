const mix = require('laravel-mix');
const path = require('path');

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
        runtimeOnly: false, // Используем полную версию Vue с компилятором
        extractStyles: false // Не извлекать стили в отдельный файл
    })
    .webpackConfig({
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.js', // Используем полную версию с компилятором (CommonJS)
                // Force single jQuery module (avoid casing duplicates: jQuery vs jquery)
                'jQuery': path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
                'jquery': path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
                'jquery$': path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
            }
        },
        watchOptions: {
            ignored: /node_modules/,
            poll: 1000 // Опционально: для лучшей работы на некоторых системах
        }
    })
    // Компиляция Tailwind CSS через PostCSS
    .postCss('resources/css/tailwind.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .js('resources/js/blog-dashboard.js', 'public/js')
    .sass('resources/sass/blog-dashboard.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/content.scss', 'public/css')
    .sass('resources/sass/windows.scss', 'public/css')
    .sass('resources/sass/elements.scss', 'public/css')
    .sass('resources/sass/fixed_elements.scss', 'public/css')
    .sass('resources/sass/box_containers.scss', 'public/css');

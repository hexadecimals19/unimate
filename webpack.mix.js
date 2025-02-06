const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue({ version: 3 }) // Ensure Vue 3 compatibility
   .babelConfig({
       presets: ['@babel/preset-env'],
   })
   .sass('resources/sass/app.scss', 'public/css')
   .setPublicPath('public');

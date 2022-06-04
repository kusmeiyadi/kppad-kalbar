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
.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
  

    .scripts([
        'node_modules/@fullcalendar/core/main.min.js',
        'node_modules/@fullcalendar/interaction/main.min.js',
        'node_modules/@fullcalendar/daygrid/main.min.js',
        'node_modules/@fullcalendar/timegrid/main.min.js',
        'node_modules/@fullcalendar/list/main.min.js',
        'node_modules/@fullcalendar/core/locales-all.js'

    ], 'public/assets/fullcalendarNPM/js/fullcalendar.js')

    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        'node_modules/moment/moment.js',

    ], 'public/assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')

    .scripts([
        'resources/views/admin/jadwal/js/script.js',
        'resources/views/admin/jadwal/js/calendar.js',

    ], 'public/assets/fullcalendarNPM/js/scriptCalendar.js')

    .styles([
        'node_modules/@fullcalendar/core/main.min.css',
        'node_modules/@fullcalendar/daygrid/main.min.css',
        'node_modules/@fullcalendar/timegrid/main.min.css',
        'node_modules/@fullcalendar/list/main.min.css',
    ], 'public/assets/fullcalendarNPM/css/fullcalendar.css')
    .sourceMaps();


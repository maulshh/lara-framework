var elixir = require('laravel-elixir');

var elixirTypscript = require('elixir-typescript');
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

elixir(function (mix) {
    mix.sass('app.scss');

    mix.copy('node_modules/core-js', 'public/node_modules/core-js');
    mix.copy('node_modules/reflect-metadata', 'public/node_modules/reflect-metadata');
    mix.copy('node_modules/zone.js/dist/zone.js', 'public/node_modules/zone.js/dist/zone.js');
    mix.copy('node_modules/systemjs', 'public/node_modules/systemjs');

    mix.copy('node_modules/@angular', 'public/node_modules/@angular');
    mix.copy('node_modules/angular2-in-memory-web-api', 'public/node_modules/angular2-in-memory-web-api');
    mix.copy('node_modules/rxjs', 'public/node_modules/rxjs');

    mix.copy('resources/assets/typescript/styles', 'public/app/styles');
    mix.copy('resources/assets/typescript/views', 'public/app/views');

    mix.typescript('app.js', 'public/app', 'resources/assets/typescript/**/*.ts', {
        "target": "ES6",
        "module": "system",
        "moduleResolution": "node",
        "sourceMap": true,
        "emitDecoratorMetadata": true,
        "experimentalDecorators": true,
        "removeComments": false,
        "noImplicitAny": false
    });
});

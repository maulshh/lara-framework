const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

elixir((mix) => {
    mix
    // .sass('app.scss')
        .webpack('app.js')
        .webpack('front.js');
});

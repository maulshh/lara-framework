try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}


$(".kembali").click(function () {
    history.go(-1);
});
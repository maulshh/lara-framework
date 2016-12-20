window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

$(".kembali").click(function () {
    history.go(-1);
});
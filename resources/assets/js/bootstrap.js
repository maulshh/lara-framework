
window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.


 import Echo from "laravel-echo"
 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: 'your-pusher-key'
 });

 **/

// Global Mixins for Vue and Component instances
window.store = {
    data: {
        loading: true
    },
    created() {
        this.loading = false;
    },
    components: {
        alert: VueStrap.alert
    },
    methods: {
        /** Todo
         *
         * nantinya ini akan dipindah sebagai directive!!
         **/
        deleteForm(object, e) {
            if (!confirm("Apa kamu yakin akan menghapus " + object + "?"))
                e.preventDefault();
            else if (e.target.tagName == 'A') {
                e.target.parentNode.submit()
            } else {
                e.target.parentNode.parentNode.submit()
            }
        }
    }
};

//Config
Vue.config.silent = true;
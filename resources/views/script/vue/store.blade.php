<script>
    Vue.component('alert', VueStrap.alert)
    Vue.config.debug = false

    var store = {
        data: {
            loading: true
        },
        created() {
            this.loading = false;
        },
        methods: {
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
    }
</script>
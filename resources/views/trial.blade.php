<!DOCTYPE html>
<html>

<head>
    <title>vue-form example</title>
    <meta charset="utf-8" />
    <style>
        label {
            display: block;
            margin-bottom: 1.5em;
        }

        label > span {
            display: inline-block;
            width: 8em;
            vertical-align: top;
        }

        .tiny-mce {
            min-height: 3em;
            border: 2px solid #ccc;
            margin-bottom: 1em;
        }

        .tiny-mce-toolbar {
            position: relative;
        }

        .tiny-mce-toolbar > div {
            position: absolute;
            top: -32px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.2.6/tinymce.min.js"></script>

</head>

<body>
<div id="vue-container">
    <form v-form name="myform" @submit.prevent="onSubmit">
        <label>
            <span>Name *</span>
            <input v-model="model.name" v-form-ctrl required name="name" />
        </label>

        <div>
            <span>Rich text *</span>
            <span v-form-ctrl="model.html" name="html" required>
                <tiny-mce id="inline-editor" :model.sync="model.html"></tiny-mce>
            </span>
        </div>

        <button type="submit">Submit</button>
    </form>

    <pre>@{{ myform | json }}</pre>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-form/0.3.1/vue-form.js"></script>

<script>
    new Vue({
        el: '#vue-container',
        replace: false,
        data: {
            myform: {},
            model: {
                name: '',
                html: '<p>Edit me!</p>'
            }
        },
        methods: {
            onSubmit: function () {
                console.log(this.myform.$valid);
            }
        },
        components: {
            tinyMce: {
                props: ['id','model'],
                template:
                        '<div>\
                            <div class="tiny-mce-toolbar">\
                                <div id="@{{id}}-toolbar"></div>\
                            </div>\
                            <div class="tiny-mce" id="@{{id}}"></div>\
                        </div>',
                watch: {
                    model: function (value) {
                        if(this._currentState === value) {
                            return;
                        }
                        this.TinyMCE_editor.setContent(value || '');
                    }
                },
                ready: function () {

                    // get access to the internal v-form-ctrl object
                    console.log(this.$el.parentElement._vueFormCtrl);

                    var vm = this;
                    var options = {
                        setup: function (editor) {

                            vm.TinyMCE_editor = editor;
                            vm.TinyMCE_isFirstChange = true;

                            editor.on('init', function () {
                                vm.TinyMCE_editor.setContent(vm.model || '');
                            });

                            editor.on('SetContent', function () {
                                if(vm.TinyMCE_isFirstChange) {
                                    vm.TinyMCE_isFirstChange = false;
                                    return;
                                }
                                vm.model = vm._currentState = editor.getContent()
                            });

                            editor.on('blur', function () {
                                vm.model = vm._currentState = editor.getContent();
                            });
                        },
                        mode: 'exact',
                        inline: true,
                        toolbar_items_size: 'small',
                        menubar: false,
                        elements: this.id,
                        fixed_toolbar_container: '#' + this.id + '-toolbar'
                    };

                    this.$nextTick(function () {
                        tinymce.init(options);
                    });

                }
            }
        }
    });
</script>

</body>

</html>
@extends('layouts.front.app', [
    'page_title' => 'Buat Data Alamat',
    'page' => 'alamat'
])

@section('content')
    <section class="overflow-hidden why-us-half-image-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="why-us-half-image-content">
                    <div class="section-title text-left">
                        <h3>Buat Alamat!</h3>
                        <p>Isi detail alamat kamu pada form berikut:</p>
                    </div>

                    <div class="">
                        <alamat-form :alamat.sync="alamat"></alamat-form>
                        @include('layouts.errors')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: '#vue-container',
            mixins: [store],
            data: {
                alamat: {!! $alamat !!}
            },
            components: {
                vSelect: VueStrap.select,
                vOption: VueStrap.option,
                checkbox: VueStrap.checkbox
            }
        })
    </script>
@endsection
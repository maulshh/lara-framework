@extends('layouts.front.app')

@section('head')
    @parent
@endsection

@section('content')
    <a name="panduan_peserta"></a>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="section-title">
                        <h3>Help</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="newsletter-wrapper" style="border-top:solid 1px #F7F7F7">
        <div class="container">
            <div class="newsletter-text clearfix">
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store]
        });
    </script>
@endsection
@extends('layouts.front.app')

@section('content')
    <a name=""></a>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="section-title">
                        <h3>About Us</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial-wrapper">
                <div class="row">
                    <form method="post">

                    </form>
                </div>
            </div>
        </div>
    </section>

    <a name="kontak"></a>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="section-title">
                        <h3>Contact Us</h3>
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
            mixins: [store]
        });
    </script>
@endsection
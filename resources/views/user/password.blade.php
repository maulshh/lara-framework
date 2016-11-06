@extends('layouts.front.app', ['page_title' => 'Ubah Password'])

@section('content')
    <section class="overflow-hidden why-us-half-image-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="why-us-half-image-content">
                    <div class="section-title text-left">
                        <h3>Ubah Password</h3>
                    </div>

                    <div class="row">
                        <form id="form-withdrawal" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="password">Masukkan Password</label>
                                <input class="form-control" name="password" type="password">
                            </div>

                            <div class="form-group">
                                <label for="password">Masukkan Password Baru</label>
                                <input class="form-control" name="password_new" type="password">
                            </div>

                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

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
            el: 'body',
            data: {
            },
            mixins: [store]
        });
    </script>
@endsection
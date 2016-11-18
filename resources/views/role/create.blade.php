@extends('layouts.admin', ['page_title' => "Buat Role Baru", 'page' => 'role'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid box-{{TMP_COLOR}}">
                <div class="box-header">
                    <h3 class="box-title">Create Form</h3>
                </div>

                <div class="box-body">
                    @include('role.form')
                </div>
            </div>
        </div>
    </div>
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
@extends('layouts.admin', ['page_title' => "Edit Permission " . $permission->label, 'page' => 'permission'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('permission.form', ['form_action' => 'admin/permission/'.$permission->id, 'form_method' => 'PATCH'])
                    </div>
                </div>
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
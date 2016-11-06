@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Edit role " . $role->label;
$page = 'role';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('role.form', ['form_action' => 'admin/role/'.$role->id, 'form_method' => 'PATCH'])
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
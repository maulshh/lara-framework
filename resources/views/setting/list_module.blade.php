@extends('layouts.admin')

<?php
$page_title = "Daftar Modul Pengaturan";
$page = 'setting';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <div class="box-tools">
                            <a href="{{url('admin/setting')}}" class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                        class="fa fa-edit"></i> &nbsp; Manage Settings</a>
                        </div>
                        <h3 class="box-title">Pilih Modul Pengaturan</h3>
                    </div>

                    <div class="box-body">
                        @foreach($modules as $module)
                            <a href="{{url("admin/setting/$module->module/update")}}"
                               class="btn btn-{{TMP_COLOR}}"><i
                                        class="fa fa-edit"></i> &nbsp; {{$module->module}}</a>
                        @endforeach
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
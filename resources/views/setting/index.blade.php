@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Pengaturan Aplikasi";
$page = 'setting';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <div class="box-tools">
                            <a href="{{url('setting/create')}}" class="btn btn-sm btn-default btn-box-tool"><i
                                        class="fa fa-plus"></i> Add New Setting
                            </a>
                        </div>
                        <h3 class="box-title">Seething?</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-hover table-stripped">
                            <tr>
                                <th>Label</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Module</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>{{$setting->label}}</td>
                                    <td>{{$setting->name}}</td>
                                    <td>{{$setting->type}}</td>
                                    <td>{{$setting->module}}</td>
                                    <td>
                                        <form action="{{url('setting/'.$setting->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <a href="#" onclick="this.parentNode.submit()" class="text-red">
                                                <i class="fa fa-times"></i> Hapus
                                            </a>
                                        </form>
                                        <a href="{{url('setting/'.$setting->id.'/edit')}}" class="">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                        @can('access-setting')
                        <div class="box-tools">
                            <a href="{{url('setting')}}" class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                        class="fa fa-edit"></i> &nbsp; Manage Settings</a>
                            <a href="{{url('setting/modules')}}" class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                        class="fa fa-share"></i> &nbsp; Move to Other Module</a>
                        </div>
                        @endif
                        <h3 class="box-title">Ubah Pengaturan</h3>
                    </div>

                    <div class="box-body">
                        <form method="POST" action="{{url('setting/value')}}">
                            <div class="row">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <input id="module" name="module" type="hidden" value="{{Request::segment(3)}}">
                                @foreach($settings as $setting)
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>{{$setting->label}}</label>
                                            <input class="form-control" type="{{$setting->type}}"
                                                   name="{{$setting->id}}"
                                                   value="{{$setting->getValue()}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-{{TMP_COLOR}}">Simpan Pengaturan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
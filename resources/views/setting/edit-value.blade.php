@extends('layouts.admin')

<?php
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
                            <a href="{{url('admin/setting')}}" class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                        class="fa fa-edit"></i> &nbsp; Manage Settings</a>
                            <a href="{{url('admin/setting/modules')}}"
                               class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                        class="fa fa-share"></i> &nbsp; Move to Other Module</a>
                        </div>
                        @endif
                        <h3 class="box-title">Ubah Pengaturan</h3>
                    </div>

                    <div class="box-body">
                        <form method="POST">
                            <div class="row">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                @foreach($settings as $setting)
                                    @if($setting->type == 'text')
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>{{$setting->label}}</label>
                                                <textarea name="{{$setting->id}}" rows="5"
                                                      placeholder="{{$setting->placeholder}}"
                                                      class="form-control">{{$setting->value}}</textarea>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>{{$setting->label}}</label>
                                                <input class="form-control" type="{{$setting->type}}"
                                                       name="{{$setting->id}}" placeholder="{{$setting->placeholder}}"
                                                       value="{{$setting->value}}">
                                            </div>
                                        </div>
                                    @endif
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

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store]
        });
    </script>
@endsection
@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Permissions";
$page = 'permission';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <div class="box-tools">
                            @if($editable)
                                <a href="{{url('permission')}}" class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                            class="fa fa-check"></i> &nbsp; Selesai</a>
                            @else
                                <a href="{{url('permission/all/edit')}}"
                                   class="btn btn-sm btn-box-tool btn-{{TMP_COLOR}}"><i
                                            class="fa fa-edit"></i> &nbsp; Edit Permission</a>
                            @endif
                        </div>
                        <h3 class="box-title">Permissions</h3>
                    </div>

                    <div class="box-body">
                            <table class="table table-stripped table-hover table-bordered">
                                <tr>
                                    <th class="col-sm-2">Module</th>
                                    <th class="col-sm-2">Name</th>
                                    @foreach ($roles as $role)
                                        <th>{{$role->label}}</th>
                                    @endforeach
                                    @if($editable)
                                        <th class="col-sm-2">
                                            <a href="{{url('role/create')}}" class="btn btn-sm btn-default"><i
                                                        class="fa fa-plus"></i> Add New Role
                                            </a>
                                        </th>
                                    @endif
                                </tr>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->label }}</td>
                                        <td>{{ $permission->name }}</td>
                                        @foreach($roles as $role)
                                            <td>
                                                @if($r = $permission->roles->where('id', $role->id)->first())
                                                    @if($editable)
                                                        <?php $pivot = $r->pivot ?>
                                                        <form action="{{url('permission/'.$pivot->permission_id.'/'.$pivot->role_id)}}"
                                                              method="POST">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <a href="#" onclick="this.parentNode.submit()"
                                                               class="text-red">
                                                                <i class="fa fa-times"></i> Hapus
                                                            </a>
                                                        </form>
                                                    @else
                                                        <span class="text-green"><i class="fa fa-check"></i></span>
                                                    @endif
                                                @else
                                                    @if($editable)
                                                        <form action="{{url('permission/'.$permission->id.'/'.$role->id)}}"
                                                              method="POST">
                                                            {{csrf_field()}}
                                                            <a href="#" onclick="this.parentNode.submit()"
                                                               class="text-green">
                                                                <i class="fa fa-plus"></i> Tambah
                                                            </a>
                                                        </form>
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                        @if($editable)
                                            <td>
                                                <form action="{{url('permission/'.$permission->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <a href="#" onclick="this.parentNode.submit()" class="text-red">
                                                        <i class="fa fa-times"></i> Hapus Permission
                                                    </a>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @if($editable)
                                    <tr>
                                        <th colspan="2">
                                            <a href="{{url('permission/create')}}" class="btn btn-sm btn-default"><i
                                                        class="fa fa-plus"></i> Add New
                                                Permission
                                            </a>
                                        </th>
                                        @foreach($roles as $role)
                                            @if($editable)
                                                <td>
                                                    <form action="{{url('role/'.$role->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <a href="#" onclick="this.parentNode.submit()" class="text-red">
                                                            <i class="fa fa-times"></i> Hapus {{$role->label}}
                                                        </a>
                                                    </form>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endif
                            </table>
                    </div>
                    <div class="box-footer">
                        <div class="callout callout-default">
                            <h4>Note:</h4>
                            <ul>
                                <li>Roles are not hierarchical.</li>
                                <li>Keep in mind that one user might have more than one roles.</li>
                                <li>Permission only used to access pages or routes.</li>
                                <li>When involving a resource (model), we use policy. (e.g: users)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
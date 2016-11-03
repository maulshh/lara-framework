@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "User Management";
$page = 'user';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <div class="box-tools">
                        </div>
                        <h3 class="box-title">Manage User</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-stripped table-hover table-bordered">
                            <tr>
                                <th class="col-sm-2">Username</th>
                                <th class="col-sm-2">Email</th>
                                <th class="col-sm-2">Member Since</th>
                                <th class="col-sm-2">Roles</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                            @foreach($users as $usr)
                                <tr>
                                    <td>
                                        <div>
                                            <div class="pull-left" style="padding:4px; min-width:54px;">
                                                <img alt="foto"
                                                     src="{{ asset($usr->avatar ? $usr->avatar : 'images/user/default.jpg') }}"
                                                     class="img img-thumbnail"
                                                     style="height:48px; width:48px">
                                            </div>
                                            <div style="padding: 2px 6px 6px 6px; font-weight:bold;">
                                                <a href="{{ url('profile/'.$usr->username) }}">{{$usr->username}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="mailto:{{ $usr->email }}">{{ $usr->email }}</a></td>
                                    <td>
                                        {{ $usr->created_at }}
                                        <br>
                                        <small class="text-green">active</small>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($usr->roles->intersect($user->roles) as $role)
                                                <li>
                                                    <form action="{{url('user/'.$usr->id.'/role/'.$role->id)}}"
                                                          method="POST">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}
                                                        <span>
                                                            {{$role->label}} &nbsp; &nbsp;
                                                            <a href="#" onclick="this.parentNode.submit()"
                                                               class="text-red"> <i class="fa fa-times"></i>
                                                            </a>
                                                        </span>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{url('user/'.$usr->id.'/role')}}"
                                           class="text-green"> <i class="fa fa-plus"></i> Add a Role
                                        </a>
                                        <form action="{{url('user/'.$usr->id)}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <a href="#" onclick="this.parentNode.submit()"
                                               class="text-red"> <i class="fa fa-times"></i> Ban this User
                                            </a>
                                        </form>
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
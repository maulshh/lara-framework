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
                        <div class="col-md-12">
                            <table class="table table-stripped table-hover table-bordered">
                                <tr>
                                    <th class="col-sm-2">Username</th>
                                    <th class="col-sm-2">Email</th>
                                    <th class="col-sm-2">Member Since</th>
                                    <th class="col-sm-2">Roles</th>
                                </tr>
                                @foreach($users as $usr)
                                    <tr>
                                        <td>{{ $usr->username }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->created_at }}</td>
                                        <td>{{ $usr->roles->intersect($user->roles) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
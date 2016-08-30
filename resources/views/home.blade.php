@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = $user->biodata->nama . " - Dashboard";
$page = 'dashboard';
$page_description = 'basically a home';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


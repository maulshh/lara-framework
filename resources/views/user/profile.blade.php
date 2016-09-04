@extends('layouts.login')

<?php
$user = Auth::user();
$page_title = $profile->biodata->nama;
$page = $profile->username;
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$profile->biodata->nama}}</h1>
            </div>
        </div>
    </div>
@endsection
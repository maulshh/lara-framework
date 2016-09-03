@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Buat Permission Baru";
$page = 'permission';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <h3 class="box-title">Create Form</h3>
                    </div>

                    <div class="box-body">
                        @include('permission.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
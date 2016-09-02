@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Buat Setting Baru";
$page = 'setting';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create Form</h3>
                    </div>

                    <div class="box-body">
                        @include('setting.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
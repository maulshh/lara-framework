@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Edit Permission " . $permission->label;
$page = 'permission';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('permission.form', ['form_action' => 'permission/'.$permission->id, 'form_method' => 'PATCH'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
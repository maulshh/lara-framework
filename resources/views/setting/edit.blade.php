@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Edit setting " . $setting->label;
$page = 'setting';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('setting.form', ['form_action' => 'setting/'.$setting->id, 'form_method' => 'PATCH'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Edit Menu " . $menu->body;
$page = 'menu';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        {{--<div class="box-tools pull-right">--}}
                        {{--<button class="btn btn-box-tool"><i class="fa fa-plus"></i></button>--}}
                        {{--</div>--}}
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('menu.form', ['form_action' => 'menu/'.$menu->id, 'form_method' => 'PATCH'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
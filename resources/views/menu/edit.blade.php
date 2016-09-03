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
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        {{--<div class="box-tools pull-right">--}}
                        {{--<button class="btn btn-box-tool"><i class="fa fa-plus"></i></button>--}}
                        {{--</div>--}}
                        <h3 class="box-title">Edit Form</h3>
                    </div>

                    <div class="box-body">
                        @include('menu.form', ['form_action' => 'menu/'.$menu->id, 'form_method' => 'PATCH'])
                    </div>
                    <div class="box-footer">
                        <div class="callout callout-default">
                            <h4>Note:</h4>
                            <ul>
                                <li>Roles are not hierarchical.</li>
                                <li>Keep in mind that one user might have more than one roles.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
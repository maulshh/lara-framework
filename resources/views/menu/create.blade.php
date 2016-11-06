@extends('layouts.admin',['page_title' => "Buat Menu Baru", 'page' => 'menu'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        <h3 class="box-title">Create Form</h3>
                    </div>

                    <div class="box-body">
                        @include('menu.form')
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
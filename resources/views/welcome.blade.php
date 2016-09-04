@extends('layouts.login')

<?php
$user = Auth::user();
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        <form method="GET" action="" class="form-inline">
                            {{--{{csrf_field()}}--}}
                            <div class="form-group">
                                <input class="form-control" placeholder="Cari makanan.." name="makanan">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" placeholder="Pilih kota" name="kota">
                                        <option> Malang</option>
                                        <option> Surabaya</option>
                                    </select>
                                    <div class="input-group-btn">
                                        <button class=" btn">
                                            Search
                                            {{--<i class="fa fa-search"></i>--}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$page['title']}}</div>

                    <div class="panel-body">
                        <form method="POST" action="">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label>Nama Restaurant</label>
                                <input class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Wilayah</label>
                                <div class="form-inline">
                                    <input class="form-control" name="provinsi" value="{{old('provinsi')}}" placeholder="Provinsi">
                                    <input class="form-control" name="kota" value="{{old('kota')}}" placeholder="Kota">
                                    <input class="form-control" name="kecamatan" value="{{old('kecamatan')}}" placeholder="Kecamatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="{{old('alamat')}}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>

                        @if(count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
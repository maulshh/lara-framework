@extends('layouts.admin')

<?php
$user = Auth::user();
$page_title = "Pengaturan Menu";
$page = 'menu';
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        {{--<div class="box-tools pull-right">--}}
                            {{--<button class="btn btn-box-tool"><i class="fa fa-plus"></i></button>--}}
                        {{--</div>--}}
                        <h3 class="box-title">Menus</h3>
                    </div>

                    <div class="box-body">
                        <a href="{{url('menu/create')}}" class="btn btn-primary"><i class="fa fa-file"></i> &nbsp; Create New
                            Menu
                        </a>
                        <hr>
                        <div class="form-group">
                            <label>Menu Target</label>
                            <select class="form-control" id="target_posts" name="target_posts"
                                    onchange="ganti_target(this.value)">
                                <option>--Pilih Target Halaman--</option>
                                <?php foreach($targets as $target){ ?>
                                <option value="<?php echo $target->module_target?>"><?php echo $target->module_target?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div id="menus">
                                @include('menu.editlist', ['menus_thislist' => $menus])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
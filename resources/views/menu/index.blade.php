@extends('layouts.admin',['page_title' => "Pengaturan Menu", 'page' => "menu"])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-{{TMP_COLOR}}">
                    <div class="box-header">
                        {{--<div class="box-tools pull-right">--}}
                            {{--<button class="btn btn-box-tool"><i class="fa fa-plus"></i></button>--}}
                        {{--</div>--}}
                        <h3 class="box-title">Menus</h3>
                    </div>

                    <div class="box-body">
                        <a href="{{url('admin/menu/create')}}" class="btn btn-{{TMP_COLOR}}"><i class="fa fa-file"></i> &nbsp; Create New
                            Menu
                        </a>
                        <hr>
                        <div class="form-group">
                            <label>Menu Target</label>
                            <select class="form-control" @change="getMenus">
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

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store],
            methods: {
                getMenus(e) {
                    this.$http.get('/api/menu/menu_list/' + e.target.value).then(function(response) {
                        $("#menus").html(response.body);
                    })
                }
            }
        });
    </script>
@endsection
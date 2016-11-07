@extends('layouts.admin', ['page_title' => $user->biodata->nama . " - Dashboard",
'page' => 'dashboard', 'page_description' => 'basically a home'])

@section('content')
    <div class="container">
        <div class="row">
            @can('change-banner')
            <div class="col-md-5">
                <div class="box box-solid box-default site-body">
                    <div class="box-header">
                        <h3 class="box-title">Upload Banner</h3>
                    </div>
                    <div class="box-body">
                        <form enctype="multipart/form-data" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-lg btn-github pull-right"
                                    type="submit"><i class="fa fa-upload"> </i> Upload
                            </button>

                            <input type="hidden" v-model="banner.width" name="width">
                            <input type="hidden" v-model="banner.height" name="height">
                            <input type="hidden" v-model="fileName" name="name">
                            <input type="hidden" v-model="banner.location" name="path">
                            <div class="form-group">
                                <input type="file" size="32" name="image"
                                       title="pilih file dari komputer anda">
                                <p class="help-block">pilih file dari komputer anda</p>
                            </div>
                            <div class="form-group">
                                <label>Banner</label>
                                <select v-model="selected_banner" class="form-control">
                                    <option v-for="(index, item) in banners" :value="index">
                                        @{{ item.label }}: width: @{{ item.width }}px - height: @{{ item.height }}px
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Variasi</label>
                                <select class="form-control" v-model="selected_variant">
                                    <option v-for="(index, item) in banner.variants" :value="index">Variasi
                                        ke-@{{ item }}</option>
                                </select>
                            </div>
                            <div>
                                <img :src="'/' + banner.location + fileName" :alt="banner.name" class="img img-responsive">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
@endsection

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store],
            data: {
                selected_banner: 0,
                selected_variant: 0,
                banners: {!! $banners->value !!}
            },
            computed: {
                banner() {
                    return this.banners[this.selected_banner]
                },
                fileName() {
                    return this.banner.name + (this.banner.variants && this.banner.variants.length ?
                            '-' + this.banner.variants[this.selected_variant] : '') + '.jpg';
                }
            }
        });
    </script>
@endsection
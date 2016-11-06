<!DOCTYPE html>
<html>
<head>
    @section('head')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ APP_TITLE }} - {{ $page_title or APP_MOTTO }}</title>
        {{-- Tell the browser to be responsive to screen width --}}
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        {{-- Bootstrap 3.3.6 --}}

        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        {{-- Font Awesome --}}
        <link rel="stylesheet"
              href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}">
        {{-- Ionicons --}}
        <link rel="stylesheet"
              href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}">
        {{-- Theme style --}}
        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/skins/skin-'.TMP_SKIN.'.min.css')}}">
    @show

</head>
<body class="hold-transition {{$body_class or ''}}">
<div class="wrapper">

    @include('layouts.header')

    @yield('main')

    @include('layouts.footer')

    @can('view-dashboard')
        @include('layouts.control-sidebar')
    @endcan

</div>
{{-- ./wrapper --}}

@section('script')
    {{-- jQuery 2.2.3 --}}
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    {{-- fastclick --}}
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    {{-- Bootstrap 3.3.6 --}}
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    {{-- AdminLTE App --}}
    <script src="{{asset('dist/js/app.min.js')}}"></script>

    <script>
        $(".kembali").click(function () {
            history.go(-1);
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/vue-strap/1.1.23/vue-strap.js"></script>

    @include('script.vue.store')
    @include('layouts.flash_message')
@show

</body>
</html>
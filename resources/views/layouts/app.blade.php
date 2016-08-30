<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{-- APP_TITLE --}} LaraFrame - {{ $page_title or /* APP_MOTTO */ "Best App Framework" }}</title>
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Bootstrap 3.3.6 --}}

    @section('css')
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        {{-- Ionicons --}}
        <link rel="stylesheet" href="https://ocdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        {{-- Theme style --}}
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    @show

    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file: --}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
{{--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
--}}
<body class="hold-transition skin-blue {{$body_class or ''}}">
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
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
{{-- fastclick --}}
<script src="plugins/fastclick/fastclick.js"></script>
{{-- Bootstrap 3.3.6 --}}
<script src="bootstrap/js/bootstrap.min.js"></script>
{{-- AdminLTE App --}}
<script src="dist/js/app.min.js"></script>
@show

</body>
</html>
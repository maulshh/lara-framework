<!DOCTYPE html>
<html>
<head>
    @section('head')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ APP_TITLE }} - {{ $page_title or APP_MOTTO }}</title>
        {{-- Tell the browser to be responsive to screen width --}}
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://unpkg.com/font-awesome/css/font-awesome.min.css">
        {{-- Ionicons --}}
        <link rel="stylesheet" href="https://unpkg.com/ionicons/dist/css/ionicons.min.css">
        {{-- Theme style --}}
        <link rel="stylesheet" href="https://unpkg.com/admin-lte/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://unpkg.com/admin-lte/dist/css/skins/skin-{{TMP_SKIN}}.min.css">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    @show

</head>
<body class="hold-transition {{$body_class or ''}}">
<div class="wrapper" id="vue-container">

    @include('layouts.header')

    @yield('main')

    @include('layouts.footer')

    @can('view-dashboard')
        @include('layouts.control-sidebar')
    @endcan

</div>
{{-- ./wrapper --}}

@section('script')
    {{--for now vuestrap only compatible with vue1--}}
    {{--<script src="https://unpkg.com/vue@2/dist/vue.min.js"></script>--}}
    <script src="https://unpkg.com/vue@1/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vue-resource/dist/vue-resource.min.js"></script>
    <script src="https://unpkg.com/vue-strap@1/dist/vue-strap.min.js"></script>

    {{-- App JS --}}
    <script src="/js/app.js"></script>
    {{-- fastclick --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
    {{-- AdminLTE App --}}
    <script src="https://unpkg.com/admin-lte/dist/js/app.min.js"></script>

    @include('layouts.flash_message')
@show

</body>
</html>
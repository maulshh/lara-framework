<!DOCTYPE html>
<html lang="en">
<head>
    @section('head')
        <meta charset="utf-8">

        <title>{{ APP_TITLE }} - {{ $page_title or APP_MOTTO }}</title>

        {{-- for Google --}}
        <meta name="description" content="{{APP_MOTTO}}">
        <meta name="keywords"
              content="{{ APP_TITLE }}, {{ APP_TITLE }}.com, frame, work, framework, laravel, vue, admin-lte, vue-table, vue-strap">

        <meta name="author" content="{{ APP_TITLE }}">
        <meta name="copyright" content="{{ APP_TITLE }}">
        <meta name="application-name" content="{{ APP_TITLE }}.com">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- CSS Plugins --}}
        <link rel="stylesheet" href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://unpkg.com/font-awesome/css/font-awesome.min.css">
        {{-- Ionicons --}}
        <link rel="stylesheet" href="https://unpkg.com/ionicons@2/css/ionicons.min.css">

        {{-- Google Fonts --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300"
              rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600,600italic,700,700italic"
              rel="stylesheet" type="text/css">

        {{-- CSS Custom --}}
        <link rel="stylesheet" href="{{asset('laraframe/main.css')}}">
        <link rel="stylesheet" href="{{asset('laraframe/style.css')}}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    @show
</head>

<body class="{{$body_class or ''}}">
    <div class="container-wrapper" id="vue-container">
        <div id="introLoader" class="introLoading introLoader gifLoader theme-dark bubble" v-show="loading">
            <div id="introLoaderSpinner" class="gifLoaderInner" style=""></div>
        </div>

        @include('layouts.front.header')

        <div class="clear"></div>

        {{-- start Main Wrapper --}}
        <div class="main-wrapper">
            @yield('content')
        </div>
        {{-- end Main Wrapper --}}

        @include('layouts.front.footer')
        @include('layouts.flash_message')

    </div>

    @section('script')
        {{--for now vuestrap only compatible with vue1--}}
        {{--<script src="https://unpkg.com/vue@2/dist/vue.min.js"></script>--}}
        <script src="https://unpkg.com/vue@1/dist/vue.js"></script>
        <script src="https://unpkg.com/vue-resource/dist/vue-resource.min.js"></script>
        <script src="https://unpkg.com/vue-strap@1.1.23/dist/vue-strap.min.js"></script>

        {{-- App JS --}}
        <script src="/js/front.js"></script>
    @show
</body>
</html>
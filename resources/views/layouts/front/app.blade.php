<!DOCTYPE html>
<html lang="en">
<head>
@section('head')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>{{ APP_TITLE }} - {{ $page_title or APP_MOTTO }}</title>

    {{-- for Google --}}
    <meta name="description" content="{{APP_MOTTO}}">
    <meta name="keywords"
          content="laraframe, laraframe.com, frame, work, framework, laravel, vue, admin-lte, vue-table, vue-strap">

    <meta name="author" content="laraframe">
    <meta name="copyright" content="Laraframe">
    <meta name="application-name" content="laraframe.com">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{-- CSS Plugins --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"/>
    <link href="{{asset('laraframe/main.css')}}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}">
    {{-- Ionicons --}}
    <link rel="stylesheet"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('laraframe/component.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600,600italic,700,700italic"
          rel="stylesheet" type="text/css">

    {{-- CSS Custom --}}
    <link href="{{asset('laraframe/style.css')}}" rel="stylesheet">
@show
</head>

<body>
<div class="container-wrapper" id="vue-container">
    <div id="introLoader" class="introLoading introLoader gifLoader theme-dark bubble" v-show="loading">
        <div id="introLoaderSpinner" class="gifLoaderInner" style=""></div>
    </div>

    {{-- start Container Wrapper --}}
    @include('layouts.front.header')

    <div class="clear"></div>

    {{-- start Main Wrapper --}}
    <div class="main-wrapper">
        @yield('content')
    </div>
    {{-- end Main Wrapper --}}

    @include('layouts.front.footer')

</div>
{{-- end Container Wrapper --}}

@section('script')
    {{-- JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
    {{--for now vuestrap only compatible with vue1--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-strap/1.1.32/vue-strap.min.js"></script>

    @include('script.vue.store')
    @include('layouts.flash_message')
@show
</body>
</html>
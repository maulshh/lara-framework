@extends('layouts.app')

<?php $body_class = "layout-top-nav" ?>

@section('main')
        {{-- Content Wrapper. Contains page content --}}
<div class="content-wrapper">
    {{-- Main content --}}
    <section class="content">

        @yield('content')

    </section>
    {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}
@endsection
@extends('layouts.app')

<?php $body_class = "sidebar-mini sidebar-collapse" ?>

@section('main')

    @include('layouts.sidebar')

        {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <h1>
                {{ $page_title or /*APP_TITLE*/ "LaraFrame" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-home"></i> Home</a></li>
                <li class="active">{{ $page or "here" }}</li>
            </ol>
        </section>

        {{-- Main content --}}
        <section class="content">

            @yield('content')

        </section>
        {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
@endsection
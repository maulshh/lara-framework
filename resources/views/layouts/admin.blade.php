@extends('layouts.app')

<?php $body_class = "sidebar-mini sidebar-collapse skin-".TMP_SKIN ?>

@section('main')

    @include('layouts.sidebar')

        {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <button class="btn btn-default btn-sm kembali pull-right" type="button"><i class="fa fa-arrow-left"></i>
                Kembali
            </button>
            <h1>
                {{ $page_title or APP_TITLE }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <ol class="breadcrumb" style="margin-right: 100px;">
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
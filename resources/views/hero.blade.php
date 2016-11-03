@extends('layouts.admin')

<?php
$user = Auth::user();
$page = 'hero';
$page_title = 'Hero Angular Frame';
?>

@section('head')
    <base href="/hero">
    @parent

    <link rel="stylesheet" href="../../public/app/styles/style.css">
    <script src="node_modules/core-js/client/shim.min.js"></script>
    <script src="node_modules/zone.js/dist/zone.js"></script>
    <script src="node_modules/reflect-metadata/Reflect.js"></script>
    <script src="node_modules/systemjs/dist/system.src.js"></script>
    <!-- 2. Configure SystemJS -->
    <script src="systemjs.config.js"></script>
    <script>
        System.import('app').catch(function (err) {
            console.error(err);
        });
    </script>
@endsection


@section('content')
    <div class="container">
        <div class="content">
            <my-app>Loading...</my-app>
        </div>
    </div>
@endsection
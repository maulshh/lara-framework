<?php $user = Auth::user() ?>

{{-- Left side column. contains the sidebar --}}
<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $user->avatar? asset($user->avatar) : asset("dist/img/user2-160x160.jpg") }}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{$user->biodata->nama}}</p>
                {{-- Status --}}
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        {{-- Sidebar Menu --}}
        @include('menu.list', ['module_target' => 'sidebar-admin', 'page' => isset($page) ? $page : false, 'parent_page' => isset($parent_page) ? $parent_page : false])
        {{-- End Sidebar --}}

    </section>
</aside>
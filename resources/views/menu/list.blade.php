<?php $noicon = isset($noicon); ?>
<ul class="sidebar-menu">
    <?php $depth = 1; ?>
    @foreach ($user->menus('sidebar-admin') as $menu)
        @while ($depth > count($pos = explode('-', $menu->position)))
                </ul>
            </li>
            <?php $depth--;?>
        @endwhile

        <?php $depth = count($pos); ?>
        @if ($menu->uri == '')
            <li class="header">{{$menu->body }}</li>
        @elseif ($menu->uri != '#')
            <li title="{{$menu->title}}" class="{{(isset($page) && $page == $menu->name)?'active':''}}">
                <a href="{{url($menu->uri)}}">
                    @if(!$noicon) <i class="fa fa-{{$menu->icon }}"></i> @endif
                    <span>{{ $menu->body }} </span>
                </a>
            </li>
        @else
            <li class="treeview {{ (isset($parent_page) && $parent_page == $menu->name) ? 'active' : ''}}">
                <a href="#">
                    @if(!$noicon) <i class="fa fa-{{$menu->icon }}"></i> @endif
                    <span>{{$menu->body}}
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
        @endif
    @endforeach

    @while ($depth > 1)
            </ul>
        </li>
        <?php $depth--; ?>
    @endwhile
</ul>
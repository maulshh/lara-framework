<?php
if (isset($module_target))
    $menus = $user->menus($module_target);
elseif (!isset($menus) || $menus == null)
    $menus = $user->menus('sidebar-admin');
?>

<ul class="sidebar-menu">
    <?php $depth = 1; ?>
    @foreach ($menus as $menu)
        @while ($depth > count($pos = explode('-', $menu->position)))
</ul>
</li>
<?php $depth--;?>
@endwhile

<?php $depth = count($pos); ?>
@if ($menu->type == 'separator')
    <li class="header">{{$menu->body }}</li>
@elseif ($menu->type != 'parent')
    <li title="{{$menu->title}}" class="{{(isset($page) && $page == $menu->name)?'active':''}}">
        <a href="{{url($menu->uri)}}">
            <i class="fa fa-{{$menu->icon }}"></i>
            <span>{{ $menu->body }} </span>
        </a>
    </li>
@else
    <li class="treeview {{ (isset($parent_page) && $parent_page == $menu->name) ? 'active' : ''}}">
        <a href="#">
            <i class="fa fa-{{$menu->icon }}"></i>
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

<?php //$menus = null; ?>
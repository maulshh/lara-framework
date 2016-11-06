<ul>
    <?php $depth = 1; ?>
    @foreach ($menus as $menu)
        @while ($depth > count($pos = explode('-', $menu->position)))
            </ul>
            </li>
            <?php $depth--;?>
        @endwhile

        <?php $depth = count($pos); ?>
        <li>
            {{$menu->position}} - {{$menu->body}} @if ($menu->type == 'separator') :separator @endif &nbsp; &nbsp; -
            <a href="{{url('admin/msettenu/'.$menu->id.'/edit')}}">edit</a>
            <form action="{{url('admin/menu/' . $menu->id)}}" class="inline" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="label label-danger" type="submit"><i class="fa fa-times"></i></button>
            </form>
        @if ($menu->type != 'parent') </li> @else <ul> @endif
    @endforeach

    @while ($depth > 1)
            </ul>
        </li>
        <?php $depth--; ?>
    @endwhile
</ul>
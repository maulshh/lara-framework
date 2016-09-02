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
            {{$menu->body}} @if ($menu->type == 'separator') :separator @endif &nbsp; &nbsp; -
            <a href="{{url('menu/'.$menu->id.'/edit')}}">edit</a>
            <form action="{{url('menu/' . $menu->id)}}" class="inline">
                {{csrf_field()}}
                <a type="submit"><i class="fa fa-times"></i></a>
            </form>
        @if ($menu->type != 'parent') </li> @else <ul> @endif
    @endforeach

    @while ($depth > 1)
            </ul>
        </li>
        <?php $depth--; ?>
    @endwhile
</ul>
@if (count($list_menu_sub) == 0)
    <li class="nav-item me-2">
        <a class="nav-link" href="{{ url($row->link) }}">
            {{ $row->name }}
        </a>
    </li>
@else
    <li class="nav-item me-2 dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url($row->link) }}" role="button" aria-expanded="true">
            {{ $row->name }}
        </a>
        <ul class="dropdown">
            @foreach ($list_menu_sub as $row_sub)
                <li>
                    <a class="dropdown-item" href="{{ url($row_sub->link) }}">{{ $row_sub->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
@endif

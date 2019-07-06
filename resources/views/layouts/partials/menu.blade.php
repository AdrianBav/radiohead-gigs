<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">

        <ul class="nav side-menu">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-users"></i> Concerts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @foreach ($concerts as $concert)
                    <li><a href="{{ route('concert', $concert) }}">{{ $concert->venue }}</a></li>
                    @endforeach
                </ul>
            </li>
            {{-- <li><a><i class="fa fa-music"></i> Releases <span class="fa fa-chevron-down"></span></a></li> --}}
        </ul>

    </div>
</div>

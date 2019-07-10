<div class="x_panel tile fixed_height_390" id="concerts">

    <div class="x_title">
        <h2>Concerts <small>Timeline of all concerts attended.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="dashboard-widget-content">
            <ul class="list-unstyled timeline widget">
                @foreach ($concerts as $concert)
                <li>
                    <div class="block">
                        <div class="block_content">
                            <h2 class="title">
                                <a href="{{ route('concert', $concert) }}">
                                    {{ $concert->venue }} <small>{{ $concert->date }}</small>
                                </a>
                            </h2>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<div class="x_panel tile fixed_height_390">
    <div class="x_title">
        <h2>Concerts <small>Timeline</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
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
                                <a href="concerts/{{ $concert->id }}">{{ $concert->venue }}</a>
                            </h2>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

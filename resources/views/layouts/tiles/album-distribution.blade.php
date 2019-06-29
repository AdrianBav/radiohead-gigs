<div class="x_panel tile fixed_height_390">
    <div class="x_title">
        <h2>Album Distribution</h2>
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
        <table class="" style="width:100%">
            <tr>
                <th style="width:37%;">
                    <p>Pie</p>
                </th>
                <th>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Album</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Distribution</p>
                    </div>
                </th>
            </tr>
            <tr>
                <td>
                    <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                </td>
                <td>
                    <table class="tile_info">
                        @foreach ($metrics->albumDistribution() as $album)
                        <tr>
                            <td>
                                <p><i class="fa fa-square blue"></i>{{ $album['title'] }}</p>
                            </td>
                            <td>{{ $album['number'] }}%</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
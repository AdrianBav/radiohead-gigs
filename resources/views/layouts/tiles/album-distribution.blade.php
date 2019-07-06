<div class="x_panel tile fixed_height_390">

    <div class="x_title">
        <h2>Album Distribution <small>Across all {{ $metrics->concertCount() }} concerts.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table style="width:100%">
            <tr>
                <th style="width:37%;">
                    <p>&nbsp;</p>
                </th>
                <th>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Album</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p style="text-align: right;">Distribution</p>
                    </div>
                </th>
            </tr>
            <tr>
                <td>
                    <chart
                        type="doughnut"
                        height="150" width="150"
                        :chart-data="{{ json_encode($metrics->albumDistributionChart()) }}"
                        id="album-distribution-chart"
                    >
                    </chart>
                </td>
                <td>
                    <table class="tile_info">
                        @foreach ($metrics->albumDistribution() as $n => $album)
                        <tr>
                            <td>
                                <p>
                                    <i class="fa fa-square" style="color: {{ $metrics->albumChartColors($n) }}"></i>
                                    {{ $album['title'] }}
                                </p>
                            </td>
                            <td>{{ $album['percentage'] }}%</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </div>

</div>

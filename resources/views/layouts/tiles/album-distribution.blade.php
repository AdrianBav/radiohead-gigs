<div class="x_panel tile fixed_height_390" id="album-distribution">

    <div class="x_title">
        <h2>Album Distribution <small>Across all {{ $metrics->concertCount() }} concerts.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">

        <div class="row">
            <div class="col-md-5 col-xs-12">
                <div class="doughnut-chart">
                    <chart
                        type="doughnut"
                        :chart-data="{{ json_encode($metrics->albumDistributionChart()) }}"
                    >
                    </chart>
                </div>
            </div>

            <div class="col-md-7 col-xs-12">
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
            </div>
        </div>

    </div>

</div>

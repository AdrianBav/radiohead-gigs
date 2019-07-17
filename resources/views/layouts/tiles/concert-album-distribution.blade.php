<div class="x_panel" id="concert-album-distribution">

    <div class="x_title">
        <h2>Album Distribution <small>at {{ $concert->venue }}</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">

        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="doughnut-chart">
                    <chart
                        type="doughnut"
                        :chart-data="{{ json_encode($concertMetrics->albumDistributionChart()) }}"
                    >
                    </chart>
                </div>
            </div>

            <div class="col-md-4 col-xs-12">
                <table class="tile_info">
                    @foreach ($concertMetrics->albumDistribution() as $n => $album)
                    <tr>
                        <td>
                            <p>
                                <i class="fa fa-square" style="color: {{ $concertMetrics->albumChartColors($n) }}"></i>
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

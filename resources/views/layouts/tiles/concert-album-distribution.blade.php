<div class="x_panel">

    <div class="x_title">
        <h2>Album Distribution <small>at {{ $concert->venue }}</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table style="width:100%">
            <tr>
                <td>
                    <chart
                        type="doughnut"
                        height="500" width="500"
                        :chart-data="{{ json_encode($concertMetrics->albumDistributionChart()) }}"
                    >
                    </chart>
                </td>
                <td>
                    <table class="tile_info">
                        @foreach ($concertMetrics->albumDistribution() as $n => $album)
                        <tr>
                            <td>
                                <p>
                                    <i class="fa fa-square" style="color: {{ $concertMetrics->albumChartColors($n) }}"></i>
                                    {{ $album['title'] }}
                                </p>
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

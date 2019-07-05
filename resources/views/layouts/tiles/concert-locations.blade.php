<div class="x_panel tile fixed_height_390">

    <div class="x_title">
        <h2>Concert Locations <small>My world travels to see Radiohead live.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="dashboard-widget-content">
            <div class="col-md-4 hidden-small">
                <h2 class="line_30">{{ $metrics->concertCount() }} Concerts in {{ $metrics->concertCountryCount() }} Countries</h2>

                <table class="countries_list">
                    <tbody>
                        @foreach ($metrics->concertCountries() as $concert)
                        <tr>
                            <td>{{ $concert->country }}</td>
                            <td class="fs15 fw700 text-right">{{ $concert->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;margin-top:30px;"></div>
        </div>
    </div>

</div>

<div class="x_panel tile fixed_height_390" id="album-coverage">

    <div class="x_title">
        <h2>Album Coverage <small>Percentage of each album played.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="horizontal-bar-chart">
            <chart
                type="horizontalBar"
                :chart-data="{{ json_encode($metrics->albumCoverageChart()) }}"
                maintainAspectRatio=true
            >
            </chart>
        </div>
    </div>

</div>

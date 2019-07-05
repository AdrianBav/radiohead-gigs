<div class="x_panel tile fixed_height_390">

    <div class="x_title">
        <h2>Album Coverage <small>Percentage of each album played.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content" style="margin-top: 15px;">
        <chart
            type="horizontalBar"
            height="280" width="480"
            :chart-data="{{ json_encode($metrics->albumCoverageChart()) }}"
        >
        </chart>
    </div>

</div>

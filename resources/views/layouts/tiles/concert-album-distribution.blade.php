<div class="x_panel">

    <div class="x_title">
        <h2>Distribution of albums <small>Sessions</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <chart
            type="doughnut"
            height="500" width="500"
            :chart-data="{{ json_encode($concertMetrics->albumDistributionChart()) }}"
        >
        </chart>
    </div>

</div>

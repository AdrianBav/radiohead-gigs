<div class="x_panel tile fixed_height_390">

    <div class="x_title">
        <h2>Top 10 Songs <small>Number of plays out of a total of {{ $metrics->concertCount() }}.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content" style="margin-top: 20px;">
        @foreach ($metrics->topTenSongs() as $song)
        <div class="widget_summary">
            <div class="w_left w_45">
                <span>{{ $song['title'] }}</span>
            </div>
            <div class="w_center w_40">
                <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $song['percentage'] }}" aria-valuemin="0" aria-valuemax="{{ $song['percentage'] }}" style="width: {{ $song['percentage'] }}%;">
                        <span class="sr-only">{{ $song['count'] }} Times</span>
                    </div>
                </div>
            </div>
            <div class="w_right w_15">
                <span>{{ $song['count'] }} Times</span>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
    </div>

</div>

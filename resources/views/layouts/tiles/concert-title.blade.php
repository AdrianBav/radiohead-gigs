<div class="x_panel" id="concert-title">

    <div class="x_title">
        <h2>{{ $concert->venue }} <small>{{ $concert->date }}</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="bs-example" data-example-id="simple-jumbotron">
            <div class="jumbotron">
                <h1><i class="fa fa-users"></i> {{ $concert->venue }}</h1>
                <h3>
                    <span><i class="fa fa-building-o"></i> in {{ $concert->city }}, {{ $concert->country }}</span>
                    <span><i class="fa fa-calendar"></i> on {{ $concert->date }}</span>
                </h3>
            </div>
        </div>
    </div>

</div>

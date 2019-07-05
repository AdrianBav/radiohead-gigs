<div class="top_tiles">

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count">{{ $metrics->concertCount() }}</div>
            <h3>Concerts attended</h3>
            <p>Total number of Radiohead concerts attended.</p>
        </div>
    </div>

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-globe"></i></div>
            <div class="count">{{ $metrics->concertCountryCount() }}</div>
            <h3>Countries visited</h3>
            <p>Radiohead concerts around the world.</p>
        </div>
    </div>

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-music"></i></div>
            <div class="count">{{ $metrics->songCount() }}</div>
            <h3>Total number of songs</h3>
            <p>Song count across all {{ $metrics->concertCount() }} concerts.</p>
        </div>
    </div>

    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-headphones"></i></div>
            <div class="count">{{ $metrics->songUniqueCount() }}</div>
            <h3>Different songs heard</h3>
            <p>Number of unique songs.</p>
        </div>
    </div>

</div>

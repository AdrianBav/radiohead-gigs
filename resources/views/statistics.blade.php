@inject('metrics', 'App\Services\MetricsService')

<h1>Statistics</h1>

<h3>Concerts</h3>
<ul>
    <li>Concerts attended: {{ $metrics->concertCount() }}</li>
    <li>
        Countried visited:
        <ul>
            @foreach ($metrics->concertCountries() as $country)
            <li>{{ $country }}</li>
            @endforeach
        </ul>
    </li>
    <li>Most in the same year: {{ $metrics->mostConcertsInYear() }}</li>
    <li>Number of songs: {{ $metrics->averageSongCount() }}</li>
</ul>

<h3>Albums</h3>
<ul>
    <li>
        Percentage of tracks played:
        <ul>
            @foreach ($metrics->albumPercentages() as $album)
            <li>{{ $album['title'] }}, {{ $album['percentage'] }}%</li>
            @endforeach
        </ul>
    </li>
</ul>

<h3>Songs</h3>
<ul>
    <li>Total number of songs: {{ $metrics->songCount() }}</li>
    <li>Number of unique songs: {{ $metrics->songUniqueCount() }}</li>
    <li>
        Top 10 most played songs:
        <ul>
            @foreach ($metrics->topTenSongs() as $song => $frequency)
            <li>{{ $song }} ({{ $frequency }})</li>
            @endforeach
        </ul>
    </li>
</ul>

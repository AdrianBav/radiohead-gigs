@inject('metrics', 'App\Services\MetricsService')

<h1>Statistics</h1>

<h3>Concerts</h3>
<ul>
    <li>{{ $metrics->concertCount() }} concerts attended</li>
    <li>
        Countried visited:
        <ul>
            @foreach ($metrics->concertCountries() as $country)
            <li>{{ $country }}</li>
            @endforeach
        </ul>
    </li>
    <li>Most in the same year: {{ $metrics->mostConcertsInYear() }}</li>
    <li>Number of songs {{ $metrics->averageSongCount() }}</li>
</ul>

<h3>Albums</h3>
<ul>
    <li>Percentage played for each album</li>
    <li>Album played (at least 1 track) count</li>
</ul>

<h3>Songs</h3>
<ul>
    <li>Number of Songs</li>
    <li>Number of unique songs</li>
    <li>Top 10 songs</li>
    <li>Songs played at every gig?</li>
</ul>

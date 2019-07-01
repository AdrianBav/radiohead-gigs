@extends('layouts._old')
@inject('metrics', 'App\Services\MetricsService')


@section('content')

    <h1>Statistics</h1>

    <ul>
        @foreach ($concerts as $concert)
        <li><a href="concerts/{{ $concert->id }}">{{ $concert->venue }}</a></li>
        @endforeach
    </ul>

    <h3>Concerts</h3>
    <ul>
        <li>Concerts attended: {{ $metrics->concertCount() }}</li>
        <li>
            Countried visited:
            <ul>
                @foreach ($metrics->concertCountries() as $concert)
                <li>{{ $concert->country }} ({{ $concert->total }})</li>
                @endforeach
            </ul>
        </li>
        <li>Countried visited: {{ $metrics->concertCountryCount() }}</li>
        <li>Most in the same year: {{ $metrics->mostConcertsInYear() }}</li>
        <li>Number of songs: {{ $metrics->averageSongCount() }}</li>
    </ul>

    <h3>Albums</h3>

    <ul>
        <li>Percentage of each album played:</li>
    </ul>
    <chart
        type="horizontalBar"
        :chart-data="{{ json_encode($metrics->albumCoverageChart()) }}"
    >
    </chart>

    <ul>
        <li>Distribution of albums:</li>
    </ul>
    <chart
        type="doughnut"
        :chart-data="{{ json_encode($metrics->albumDistributionChart()) }}"
    >
    </chart>

    <h3>Songs</h3>
    <ul>
        <li>Total number of songs: {{ $metrics->songCount() }}</li>
        <li>Number of unique songs: {{ $metrics->songUniqueCount() }}</li>
        <li>
            Top 10 most played songs:
            <ul>
                @foreach ($metrics->topTenSongs() as $song)
                <li>{{ $song['title'] }} ({{ $song['count'] }})</li>
                @endforeach
            </ul>
        </li>
    </ul>

@endsection

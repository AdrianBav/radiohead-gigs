@extends('layouts.app')


@section('content')

    <h1>{{ $concert->venue }}</h1>
    <h3>{{ $concert->city }}, {{ $concert->country }}</h3>
    <p>{{ $concert->date }}</p>

    <h3>Setlist</h3>
    <ul>
        @foreach ($concert->setlist as $song)
        <li>{{ $song->title }} @include('partials.debut')</li>
        @endforeach
    </ul>

    <h3>Songs on Albums</h3>
    <ul>
        @foreach ($concertMetrics->albumPercentages() as $album)
        <li>{{ $album['title'] }}, {{ $album['percentage'] }}%</li>
        @endforeach
    </ul>

    <div style="width: 600px;">
        <album-share-chart
            :chart-data="{{ json_encode($concertMetrics->albumPercentagesForChart()) }}"
        >
        </album-share-chart>
    </div>

@endsection

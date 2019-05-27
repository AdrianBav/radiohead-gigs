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

    <h3>Distribution of albums</h3>
    <chart
        type="doughnut"
        :chart-data="{{ json_encode($concertMetrics->albumDistributionChart()) }}"
    >
    </chart>

@endsection

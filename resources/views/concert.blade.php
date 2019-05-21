<h1>{{ $concert->venue }}</h1>
<h3>{{ $concert->city }}, {{ $concert->country }}</h3>
<p>{{ $concert->date }}</p>

<h3>Setlist</h3>
<ul>
    @foreach ($concert->setlist as $song)
    <li>{{ $song->title }}</li>
    @endforeach
</ul>

<h3>Songs on Albums</h3>
<ul>
    @foreach ($concertMetrics->albumPercentages() as $album)
    <li>{{ $album['title'] }}, {{ $album['percentage'] }}%</li>
    @endforeach
</ul>

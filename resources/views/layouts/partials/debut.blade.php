@if ($concert->debut($song) && $song->title != 'Encore')
    <span class="badge bg-green">1st Play</span>
@endif

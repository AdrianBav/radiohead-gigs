<?php

namespace App\Services;

use App\Concert;
use App\Release;

class ConcertMetricsService
{
    /**
     * The concert to get the metrics for.
     *
     * @var  App\Concert
     */
    protected $concert;

    /**
     * Instantiate a new instance of ConcertMetricsService.
     *
     * @param  App\Concert  $concert
     */
    public function __construct(Concert $concert)
    {
        $this->concert = $concert;
    }

    /**
     * Percentage of tracks played on each album.
     *
     * @return  Collection
     */
    public function albumPercentages()
    {
        $allSongsPerformed = $this->concert->setlist->map(function($song) {
            return $song->title;
        });

        return Release::where('isAlbum', true)
            ->get()
            ->map(function ($album) use ($allSongsPerformed) {
                $albumSongs = $album->songs->pluck('title');
                $songsPlayed = $albumSongs->intersect($allSongsPerformed);

                $percentagePlayed = round(($songsPlayed->count() / $albumSongs->count()) * 100);

                return [
                    'title' => $album->title,
                    'percentage' => $percentagePlayed
                ];
            });
    }
}

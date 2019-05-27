<?php

namespace App\Services;

use App\Concert;
use App\Release;
use Illuminate\Support\Facades\Cache;

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
     * Percentage of tracks played on each album formatted for display in a pie chart.
     *
     * @return  Collection
     */
    public function albumDistributionChart()
    {
        $cacheKey = sprintf('albumDistributionChart-%s', $this->concert->id);

        $albumPercentages = Cache::rememberForever($cacheKey, function () {
            return $this->albumDistribution()
                ->reject(function ($album) {
                    return $album['number'] == 0;
                });
        });

        return [
            'datasets' => [
                [
                    'backgroundColor' => Release::albumChartColors(),
                    'data' => $albumPercentages->pluck('number'),
                ],
            ],
            'labels' => $albumPercentages->pluck('title'),
        ];
    }

    /**
     * Calculate the distribution of songs across all albums.
     *
     * @return  Collection
     */
    private function albumDistribution()
    {
        $allSongsPerformed = $this->concert->setlist->map(function ($song) {
            return $song->title;
        });

        $albums = Release::where('isAlbum', true)
            ->get()
            ->map(function ($album) use ($allSongsPerformed) {
                return $this->numberOfTracksPlayed($album, $allSongsPerformed);
            })
            ->sortByDesc('number');

        $nonAlbum = [
            'title' => 'Non-album',
            'number' => ($this->concertSongCount() - $albums->sum('number')),
        ];

        return $albums->push($nonAlbum);
    }

    /**
     * Calcualte the number of tracks played from the given album.
     *
     * @param   Object  $album
     * @param   Collection  $allSongsPerformed
     * @return  array
     */
    private function numberOfTracksPlayed($album, $allSongsPerformed)
    {
        $albumSongs = $album->songs->pluck('title');
        $songsPlayed = $albumSongs->intersect($allSongsPerformed);

        return [
            'title' => $album->title,
            'number' => $songsPlayed->count(),
        ];
    }

    /**
     * Total song count.
     *
     * @return  integer
     */
    private function concertSongCount()
    {
        return $this->concert->setlist
            ->reject(function ($song) {
                return $song->title == 'Encore';
            })->count();
    }
}

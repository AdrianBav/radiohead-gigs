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
     * Accessor for album chart colors.
     *
     * @param   integer  $albumNumber
     * @return  string
     */
    public function albumChartColors($albumNumber)
    {
        return Release::albumChartColors()[$albumNumber];
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
            return $this->albumDistribution();
        });

        return [
            'datasets' => [
                [
                    'backgroundColor' => $this->getAlbumDistributionChartColors($albumPercentages->keys()),
                    'data' => $albumPercentages->pluck('percentage'),
                ],
            ],
            'labels' => $albumPercentages->pluck('title'),
        ];
    }

    /**
     * Get album distribution chart colors.
     *
     * @param   Collection  $keys
     * @return  array
     */
    public function getAlbumDistributionChartColors($keys)
    {
        return $keys->map(function ($key) {
            return Release::albumChartColors()[$key];
        })->all();
    }

    /**
     * Calculate the distribution of songs across all albums.
     *
     * @return  Collection
     */
    public function albumDistribution()
    {
        $allSongsPerformed = $this->concert->setlist->map(function ($song) {
            return $song->title;
        });

        $albums = Release::where('isAlbum', true)
            ->get()
            ->map(function ($album) use ($allSongsPerformed) {
                return $this->percentageOfAllTracksPlayed($album, $allSongsPerformed);
            })
            ->sortByDesc('percentage');

        $nonAlbum = [
            'title' => 'Non-album',
            'percentage' => (100 - $albums->sum('percentage')),
        ];

        $albums->push($nonAlbum);

        return $albums->reject(function ($album) {
            return $album['percentage'] == 0;
        });
    }

    /**
     * Calcualte the percentage of tracks played from the given album.
     *
     * @param   Object  $album
     * @param   Collection  $allSongsPerformed
     * @return  array
     */
    private function percentageOfAllTracksPlayed($album, $allSongsPerformed)
    {
        $albumSongs = $album->songs->pluck('title');
        $songsPlayed = $albumSongs->intersect($allSongsPerformed);

        return [
            'title' => $album->title,
            'percentage' => round(($songsPlayed->count() / $this->concertSongCount()) * 100),
        ];
    }

    /**
     * Total song count.
     *
     * @return  integer
     */
    public function concertSongCount()
    {
        $cacheKey = sprintf('concertSongCount-%s', $this->concert->id);

        return Cache::rememberForever($cacheKey, function () {
            return $this->concert->setlist
                ->reject(function ($song) {
                    return $song->title == 'Encore';
                })->count();
        });
    }
}

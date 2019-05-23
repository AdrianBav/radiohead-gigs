<?php

namespace App\Services;

use App\Concert;
use App\Perform;
use App\Release;
use Illuminate\Support\Facades\Cache;

class MetricsService
{
    /**
     * Number of concerts attented.
     *
     * @return  integer
     */
    public function concertCount()
    {
        return Cache::rememberForever('concertCount', function () {
            return Concert::count();
        });
    }

    /**
     * List of countries visited.
     *
     * @return  array
     */
    public function concertCountries()
    {
        return Cache::rememberForever('concertCountries', function () {
            return Concert::select('country')
                ->distinct()
                ->pluck('country');
        });
    }

    /**
     * Most concerts attended in the same year.
     *
     * @return  string
     */
    public function mostConcertsInYear()
    {
        $most = Cache::rememberForever('mostConcertsInYear', function () {
            return Concert::selectRaw('COUNT(*) AS total')
                //->selectRaw('YEAR("date") AS year')           // mysql
                ->selectRaw('STRFTIME("%Y", date) AS year')     // sqlite
                ->groupBy('year')
                ->orderBy('total', 'desc')
                ->first();
        });

        return sprintf('%s (%s)', $most['total'], $most['year']);
    }

    /**
     * List of min, max and average song counts.
     *
     * @return  string
     */
    public function averageSongCount()
    {
        $concertSongs = Cache::rememberForever('averageSongCount', function () {
            return Concert::withCount('setlist')->pluck('setlist_count');
        });

        return sprintf('Min: %s, Avg: %s, Max: %s',
            $concertSongs->min(),
            round($concertSongs->avg()),
            $concertSongs->max()
        );
    }

    /**
     * Percentage of tracks played on each album.
     *
     * @return  Collection
     */
    public function albumPercentages()
    {
        $allSongsPerformed = $this->allSongsPerformed()->unique();

        return Cache::rememberForever('albumPercentages', function () use ($allSongsPerformed) {
            return Release::where('isAlbum', true)
                ->get()
                ->map(function ($album) use ($allSongsPerformed) {
                    return $this->calculatePercentage($album, $allSongsPerformed);
                })
                ->sortByDesc('percentage');
        });
    }

    /**
     * Calculate the percentage of album songs played.
     *
     * @param   App\Release  $album
     * @param   Collection   $allSongsPerformed
     * @return  array
     */
    private function calculatePercentage($album, $allSongsPerformed)
    {
        $albumSongs = $album->songs->pluck('title');
        $songsPlayed = $albumSongs->intersect($allSongsPerformed);

        $percentagePlayed = round(($songsPlayed->count() / $albumSongs->count()) * 100);

        return [
            'title' => $album->title,
            'percentage' => $percentagePlayed
        ];
    }

    /**
     * Percentage of tracks played on each album formatted for display in a pie chart.
     *
     * @return  Collection
     */
    public function albumPercentagesForChart()
    {
        $albumPercentages = $this->albumPercentages()
            ->reject(function ($album) {
                return $album['percentage'] == 0;
            });

        return [
            'datasets' => [
                [
                    'backgroundColor' => Release::albumChartColors(),
                    'data' => $albumPercentages->pluck('percentage'),
                ],
            ],
            'labels' => $albumPercentages->pluck('title'),
        ];
    }

    /**
     * Total song count.
     *
     * @return  integer
     */
    public function songCount()
    {
        return Cache::rememberForever('songCount', function () {
            return Perform::count();
        });
    }

    /**
     * Number of unique songs.
     *
     * @return  integer
     */
    public function songUniqueCount()
    {
        return Cache::rememberForever('songUniqueCount', function () {
            return $this->allSongsPerformed()->unique()->count();
        });
    }

    /**
     * Top ten songs on frequency played.
     *
     * @return  Collection
     */
    public function topTenSongs()
    {
        return Cache::rememberForever('topTenSongs', function () {
            return $this->allSongsPerformed()
                ->countBy()
                ->sortByDesc(function ($songCount) {
                    return $songCount;
                })
                ->take(10);
        });
    }

    /**
     * Get a collection of all songs performed.
     *
     * @return  Collection
     */
    private function allSongsPerformed()
    {
        return Cache::rememberForever('allSongsPerformed', function () {
            return Perform::with('song:id,title')
                ->get()
                ->map(function ($performed) {
                    return $performed->song->title;
                })
                ->reject(function ($title) {
                    return $title == 'Encore';
                });
        });
    }
}

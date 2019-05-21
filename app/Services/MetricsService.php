<?php

namespace App\Services;

use App\Concert;
use App\Perform;
use App\Release;

class MetricsService
{
    /**
     * Number of concerts attented.
     *
     * @return  integer
     */
    public function concertCount()
    {
        return Concert::count();
    }

    /**
     * List of countries visited.
     *
     * @return  array
     */
    public function concertCountries()
    {
        return Concert::select('country')->distinct()->pluck('country');
    }

    /**
     * Most concerts attended in the same year.
     *
     * @return  string
     */
    public function mostConcertsInYear()
    {
        $most = Concert::selectRaw('COUNT(*) AS total')
            //->selectRaw('YEAR("date") AS year')           // mysql
            ->selectRaw('STRFTIME("%Y", date) AS year')     // sqlite
            ->groupBy('year')
            ->orderBy('total', 'desc')
            ->first();

        return sprintf('%s (%s)', $most['total'], $most['year']);
    }

    /**
     * List of min, max and average song counts.
     *
     * @return  string
     */
    public function averageSongCount()
    {
        $concertSongs = Concert::withCount('songs')->pluck('songs_count');

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
        $allSongsPerformed = Perform::with('song:id,title')
            ->get()
            ->map(function ($performed) {
                return $performed->song->title;
            })
            ->unique();

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

    /**
     * Total song count.
     *
     * @return  integer
     */
    public function songCount()
    {
        return Perform::count();
    }

    /**
     * Number of unique songs.
     *
     * @return  integer
     */
    public function songUniqueCount()
    {
        return Perform::with('song:id,title')
            ->get()
            ->map(function ($performed) {
                return $performed->song->title;
            })
            ->unique()
            ->count();
    }

    /**
     * Top ten songs on frequency played.
     *
     * @return  Collection
     */
    public function topTenSongs()
    {
        return Perform::with('song:id,title')
            ->get()
            ->map(function ($performed) {
                return $performed->song->title;
            })
            ->reject(function ($value) {
                return $value == 'Encore';
            })
            ->countBy()
            ->sortByDesc(function ($songCount) {
                return $songCount;
            })
            ->take(10);
    }
}

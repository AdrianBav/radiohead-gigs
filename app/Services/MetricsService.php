<?php

namespace App\Services;

use App\Concert;
use App\Perform;
use App\Release;

class MetricsService
{
    /**
     * [concertCount description]
     *
     * @return  [type]
     */
    public function concertCount()
    {
        return Concert::count();
    }

    /**
     * [concertCountriesCount description]
     *
     * @return  [type]
     */
    public function concertCountries()
    {
        return Concert::select('country')->distinct()->pluck('country');
    }

    /**
     * [mostGigsInYear description]
     *
     * @return  [type]
     */
    public function mostConcertsInYear()
    {
        $most = Concert::selectRaw('COUNT(*) AS total')
            //->selectRaw('YEAR("date") AS year')       // mysql
            ->selectRaw('STRFTIME("%Y", date) AS year') // sqlite
            ->groupBy('year')
            ->orderBy('total', 'desc')
            ->first();

        return sprintf('%s (%s)', $most['total'], $most['year']);
    }

    /**
     * [averageSongCount description]
     *
     * @return  [type]
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
     * [albumPercentages description]
     *
     * @return  [type]
     */
    public function albumPercentages()
    {
        $allSongsPerformed = Perform::with('song:id,title')
            ->get()
            ->map(function($performed) {
                return $performed->song->title;
            })
            ->unique();

        return Release::where('isAlbum', true)
            ->get()
            ->map(function($album) use ($allSongsPerformed) {
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

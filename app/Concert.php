<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the setlist for the concert.
     */
    public function setlist()
    {
        return $this->belongsToMany(Song::class, 'performed')
            ->using(Perform::class)
            ->withPivot([
                'order'
            ]);
    }

    /**
     * Add songs to concert.
     *
     * @param  array  $setlist
     */
    public function addSongs($setlist)
    {
        collect($setlist)->each(function($songTitle, $n) {
            $song = Song::whereTitle($songTitle)->firstOrFail();

            $this->setlist()->attach($song->id, ['order' => $n]);
        });
    }

    /**
     * Determine if a song is being played for the first time.
     *
     * @param   Song  $song
     * @return  boolean
     */
    public function debut(Song $song)
    {
        $previousConcertIds = $this->where('date', '<', $this->date)->pluck('id');

        if ($previousConcertIds->isEmpty()) {
            return false;
        }

        $previousSongsPerformed = Perform::with('song:id,title')
            ->whereIn('concert_id', $previousConcertIds)
            ->get()
            ->map(function ($performed) {
                return $performed->song->title;
            })
            ->unique();

        return (! $previousSongsPerformed->contains($song->title));
    }
}

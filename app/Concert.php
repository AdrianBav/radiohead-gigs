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
     * Get the songs for the concert.
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
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

            $this->songs()->attach($song->id, ['order' => $n]);
        });
    }
}

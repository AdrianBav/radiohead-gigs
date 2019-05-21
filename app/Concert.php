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
}

<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['setlist'];

    /**
     * Format the date.
     *
     * @param  string  $value
     * @return string
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('jS F Y');
    }

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
        $dateWithoutAccessor = $this->getAttributes()['date'];
        $previousConcertIds = $this->where('date', '<', $dateWithoutAccessor)->pluck('id');

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

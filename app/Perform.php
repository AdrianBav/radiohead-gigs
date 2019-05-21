<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Perform extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'performed';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get the concert.
     */
    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }

    /**
     * Get the song.
     */
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}

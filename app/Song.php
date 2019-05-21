<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
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
     * Get the concerts for the song.
     */
    public function concerts()
    {
        return $this->belongsToMany(Concert::class, 'performed')
            ->using(Perform::class)
            ->withPivot([
                'order'
            ]);
    }
}

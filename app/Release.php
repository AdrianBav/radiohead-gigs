<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'isAlbum' => 'boolean',
    ];

    /**
     * Get the songs for the release.
     */
    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    /**
     * Chart colors.
     *
     * @return  array
     */
    public static function albumChartColors()
    {
        return [
            '#0074d9',
            '#ff4136',
            '#2ecc40',
            '#ff851b',
            '#7fdbff',
            '#b10dc9',
            '#ffdc00',
            '#001f3f',
            '#39cccc',
        ];
    }
}

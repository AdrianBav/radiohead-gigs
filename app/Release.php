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
            '#000000',
            '#8abb6f',
            '#3498db',
            '#9b59b6',
            '#e74c3c',
            '#455c73',
            '#1abb9c',
            '#9cc2cb',
            '#f0ad4e',
            '#bdc3c7',
        ];
    }
}

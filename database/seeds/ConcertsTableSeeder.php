<?php

use App\Concert;
use Illuminate\Database\Seeder;

class ConcertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concerts')->insert([
            //['venue' => 'Nottingham Arena', 'city' => 'Nottingham', 'country' => 'UK', 'date' => '2003-11-29'],
            //['venue' => 'Heineken Music Hall', 'city' =>  'Amsterdam', 'country' => 'Netherlands', 'date' => '2006-05-09'],
            ['venue' => 'Rock en Seine', 'city' =>  'Paris', 'country' => 'France', 'date' => '2006-08-26'],
            ['venue' => '93 Feet East', 'city' =>  'London', 'country' => 'UK', 'date' => '2008-01-16'],
            ['venue' => 'Victoria Park', 'city' =>  'London', 'country' => 'UK', 'date' => '2008-06-24'],
            ['venue' => 'Victoria Park', 'city' =>  'London', 'country' => 'UK', 'date' => '2008-06-25'],
            ['venue' => 'Santa Barbara Bowl', 'city' =>  'Santa Barbara, CA', 'country' => 'USA', 'date' => '2008-08-28'],
            ['venue' => 'American Airlines Center', 'city' =>  'Dallas, TX', 'country' => 'USA', 'date' => '2012-03-05'],
            ['venue' => 'ACL (Zilker Park)', 'city' =>  'Austin, TX', 'country' => 'USA', 'date' => '2016-09-30'],
        ]);

        Concert::create([
            'venue' => 'Nottingham Arena',
            'city' => 'Nottingham',
            'country' => 'UK',
            'date' => '2003-11-29'
        ])->addSongs([
            'You',
            'Creep',
            'How Do You?',
        ]);

        Concert::create([
            'venue' => 'Heineken Music Hall',
            'city' =>  'Amsterdam',
            'country' => 'Netherlands',
            'date' => '2006-05-09'
        ])->addSongs([
            'Planet Telex',
            'The Bends',
            'High and Dry',
        ]);
    }
}

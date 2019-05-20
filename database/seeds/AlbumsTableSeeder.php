<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            ['title' => 'Pablo Honey', 'release' => 1993],
            ['title' => 'The Bends', 'release' => 1995],
            ['title' => 'OK Computer', 'release' => 1997],
            ['title' => 'Kid A', 'release' => 2000],
            ['title' => 'Amnesiac', 'release' => 2001],
            ['title' => 'Hail to the Thief', 'release' => 2003],
            ['title' => 'In Rainbows', 'release' => 2007],
            ['title' => 'The King of Limb', 'release' => 2011],
            ['title' => 'A Moon Shaped Pool', 'release' => 2016],
        ]);
    }
}

<?php

use App\Song;
use App\Release;
use Illuminate\Database\Seeder;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Albums...

        Release::create([
            'title' => 'Pablo Honey',
            'isAlbum' => true,
            'year' => 1993,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'You']),
            new Song(['track' => 2, 'title' => 'Creep']),
            new Song(['track' => 3, 'title' => 'How Do You?']),
            new Song(['track' => 4, 'title' => 'Stop Whispering']),
            new Song(['track' => 5, 'title' => 'Thinking About You']),
            new Song(['track' => 6, 'title' => 'Anyone Can Play Guitar']),
            new Song(['track' => 7, 'title' => 'Ripcord']),
            new Song(['track' => 8, 'title' => 'Vegetable']),
            new Song(['track' => 9, 'title' => 'Prove Yourself']),
            new Song(['track' => 10, 'title' => 'I Can\'t']),
            new Song(['track' => 11, 'title' => 'Lurgee']),
            new Song(['track' => 12, 'title' => 'Blow Out']),
        ]);

        Release::create([
            'title' => 'The Bends',
            'isAlbum' => true,
            'year' => 1995,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Planet Telex']),
            new Song(['track' => 2, 'title' => 'The Bends']),
            new Song(['track' => 3, 'title' => 'High and Dry']),
            new Song(['track' => 4, 'title' => 'Fake Plastic Trees']),
            new Song(['track' => 5, 'title' => 'Bones']),
            new Song(['track' => 6, 'title' => '(Nice Dream)']),
            new Song(['track' => 7, 'title' => 'Just']),
            new Song(['track' => 8, 'title' => 'My Iron Lung']),
            new Song(['track' => 9, 'title' => 'Bullet Proof..I Wish I Was']),
            new Song(['track' => 10, 'title' => 'Black Star']),
            new Song(['track' => 11, 'title' => 'Sulk']),
            new Song(['track' => 12, 'title' => 'Street Spirit (Fade Out)']),
        ]);

        Release::create([
            'title' => 'OK Computer',
            'isAlbum' => true,
            'year' => 1997,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Airbag']),
            new Song(['track' => 2, 'title' => 'Paranoid Android']),
            new Song(['track' => 3, 'title' => 'Subterranean Homesick Alien']),
            new Song(['track' => 4, 'title' => 'Exit Music (For a Film)']),
            new Song(['track' => 5, 'title' => 'Let Down']),
            new Song(['track' => 6, 'title' => 'Karma Police']),
            new Song(['track' => 7, 'title' => 'Fitter Happier']),
            new Song(['track' => 8, 'title' => 'Electioneering']),
            new Song(['track' => 9, 'title' => 'Climbing Up the Walls']),
            new Song(['track' => 10, 'title' => 'No Surprises']),
            new Song(['track' => 11, 'title' => 'Lucky']),
            new Song(['track' => 12, 'title' => 'The Tourist']),
        ]);

        Release::create([
            'title' => 'Kid A',
            'isAlbum' => true,
            'year' => 2000,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Everything in Its Right Place']),
            new Song(['track' => 2, 'title' => 'Kid A']),
            new Song(['track' => 3, 'title' => 'The National Anthem']),
            new Song(['track' => 4, 'title' => 'How to Disappear Completely']),
            new Song(['track' => 5, 'title' => 'Treefingers']),
            new Song(['track' => 6, 'title' => 'Optimistic']),
            new Song(['track' => 7, 'title' => 'In Limbo']),
            new Song(['track' => 8, 'title' => 'Idioteque']),
            new Song(['track' => 9, 'title' => 'Morning Bell']),
            new Song(['track' => 10, 'title' => 'Motion Picture Soundtrack']),
        ]);

        Release::create([
            'title' => 'Amnesiac',
            'isAlbum' => true,
            'year' => 2001,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Packt Like Sardines in a Crushd Tin Box']),
            new Song(['track' => 2, 'title' => 'Pyramid Song']),
            new Song(['track' => 3, 'title' => 'Pulk/Pull Revolving Doors']),
            new Song(['track' => 4, 'title' => 'You and Whose Army?']),
            new Song(['track' => 5, 'title' => 'I Might Be Wrong']),
            new Song(['track' => 6, 'title' => 'Knives Out']),
            new Song(['track' => 7, 'title' => 'Morning Bell/Amnesiac']),
            new Song(['track' => 8, 'title' => 'Dollars and Cents']),
            new Song(['track' => 9, 'title' => 'Hunting Bears']),
            new Song(['track' => 10, 'title' => 'Like Spinning Plates']),
            new Song(['track' => 11, 'title' => 'Life in a Glasshouse']),
        ]);

        Release::create([
            'title' => 'Hail to the Thief',
            'isAlbum' => true,
            'year' => 2003,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => '2 + 2 = 5']),
            new Song(['track' => 2, 'title' => 'Sit down. Stand up']),
            new Song(['track' => 3, 'title' => 'Sail to the Moon']),
            new Song(['track' => 4, 'title' => 'Backdrifts']),
            new Song(['track' => 5, 'title' => 'Go to Sleep']),
            new Song(['track' => 6, 'title' => 'Where I End and You Begin']),
            new Song(['track' => 7, 'title' => 'We suck Young Blood']),
            new Song(['track' => 8, 'title' => 'The Gloaming']),
            new Song(['track' => 9, 'title' => 'There There']),
            new Song(['track' => 10, 'title' => 'I Will']),
            new Song(['track' => 11, 'title' => 'A Punchup at a Wedding']),
            new Song(['track' => 12, 'title' => 'Myxomatosis']),
            new Song(['track' => 13, 'title' => 'Scatterbrain']),
            new Song(['track' => 14, 'title' => 'A Wolf at the Door']),
        ]);

        Release::create([
            'title' => 'In Rainbows',
            'isAlbum' => true,
            'year' => 2007,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => '15 Step']),
            new Song(['track' => 2, 'title' => 'Bodysnatchers']),
            new Song(['track' => 3, 'title' => 'Nude']),
            new Song(['track' => 4, 'title' => 'Weird Fishes/Arpeggi']),
            new Song(['track' => 5, 'title' => 'All I Need']),
            new Song(['track' => 6, 'title' => 'Faust Arp']),
            new Song(['track' => 7, 'title' => 'Reckoner']),
            new Song(['track' => 8, 'title' => 'House of Cards']),
            new Song(['track' => 9, 'title' => 'Jigsaw Falling into Place']),
            new Song(['track' => 10, 'title' => 'Videotape']),
        ]);

        Release::create([
            'title' => 'The King of Limbs',
            'isAlbum' => true,
            'year' => 2011,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Bloom']),
            new Song(['track' => 2, 'title' => 'Morning Mr Magpie']),
            new Song(['track' => 3, 'title' => 'Little by Little']),
            new Song(['track' => 4, 'title' => 'Feral']),
            new Song(['track' => 5, 'title' => 'Lotus Flower']),
            new Song(['track' => 6, 'title' => 'Codex']),
            new Song(['track' => 7, 'title' => 'Give Up the Ghost']),
            new Song(['track' => 8, 'title' => 'Separator']),
        ]);

        Release::create([
            'title' => 'A Moon Shaped Pool',
            'isAlbum' => true,
            'year' => 2016,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'Burn the Witch']),
            new Song(['track' => 2, 'title' => 'Daydreaming']),
            new Song(['track' => 3, 'title' => 'Decks Dark']),
            new Song(['track' => 4, 'title' => 'Desert Island Disk']),
            new Song(['track' => 5, 'title' => 'Ful Stop']),
            new Song(['track' => 6, 'title' => 'Glass Eyes']),
            new Song(['track' => 7, 'title' => 'Identikit']),
            new Song(['track' => 8, 'title' => 'The Numbers']),
            new Song(['track' => 9, 'title' => 'Present Tense']),
            new Song(['track' => 10, 'title' => 'Tinker Tailor Soldier Sailor Rich Man Poor Man Beggar Man Thief']),
            new Song(['track' => 11, 'title' => 'True Love Waits']),
        ]);


        // Non-albums...

        Release::create([
            'title' => 'In Rainbows Disk 2',
            'isAlbum' => false,
            'year' => 2007,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'MK 1']),
            new Song(['track' => 2, 'title' => 'Down Is the New Up']),
            new Song(['track' => 3, 'title' => 'Go Slowly']),
            new Song(['track' => 4, 'title' => 'MK 2']),
            new Song(['track' => 5, 'title' => 'Last Flowers']),
            new Song(['track' => 6, 'title' => 'Up on the Ladder']),
            new Song(['track' => 7, 'title' => 'Bangers + Mash']),
            new Song(['track' => 8, 'title' => '4 Minute Warning']),
        ]);

        Release::create([
            'title' => 'The Daily Mail / Staircase',
            'isAlbum' => false,
            'year' => 2011,
        ])->songs()->saveMany([
            new Song(['track' => 1, 'title' => 'The Daily Mail']),
            new Song(['track' => 2, 'title' => 'Staircase']),
        ]);

        Release::create([
            'title' => 'B-sides',
            'isAlbum' => false,
        ])->songs()->saveMany([
            new Song(['title' => 'Fog']),
            new Song(['title' => 'Talk Show Host']),
            new Song(['title' => 'The Amazing Sounds of Orgy']),
        ]);

        Release::create([
            'title' => 'Unreleased',
            'isAlbum' => false,
        ])->songs()->saveMany([
            new Song(['title' => 'Spooks']),
            new Song(['title' => 'Skirting on the Surface']),
        ]);

        Release::create([
            'title' => 'Thom Yorke Solo',
            'isAlbum' => false,
        ])->songs()->saveMany([
            new Song(['title' => 'Cymbal Rush']),
        ]);

        Release::create([
            'title' => 'Miscellaneous',
            'isAlbum' => false,
        ])->songs()->saveMany([
            new Song(['title' => 'Encore']),
        ]);
    }
}

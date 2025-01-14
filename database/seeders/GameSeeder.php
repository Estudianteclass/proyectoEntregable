<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::table('games')->insert([
            'title' => 'The Witcher 3',
            'genre' => 'rpg',
            'price' => '12.5',
            'developer' => 'CD Projekt Red',
            'year' => '2015',
            'cover' => 'photo_example',

        ]);
        DB::table('games')->insert([
            'title' => 'Death Space',
            'genre' => 'horror',
            'price' => '15.99',
            'developer' => 'Motive Studio',
            'year' => '2011',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Forza Horizon',
            'genre' => 'racing',
            'price' => '34',
            'developer' => 'Microsoft',
            'year' => '2020',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Animal crossing',
            'genre' => 'simulation',
            'price' => '27.99',
            'developer' => 'Nintendo',
            'year' => '2021',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Pokemon Sword Edition',
            'genre' => 'rpg',
            'price' => '60',
            'developer' => 'Game freak',
            'year' => '2022',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Battlefield 2042',
            'genre' => 'shooter',
            'price' => '70',
            'developer' => 'DICE',
            'year' => '2021',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Grand Theft Auto 5',
            'genre' => 'action',
            'price' => '60',
            'developer' => 'Rockstar Games',
            'year' => '2013',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Scarlet Nexus',
            'genre' => 'rpg',
            'price' => '46',
            'developer' => 'Namco Bandai',
            'year' => '2019',
            'cover' => 'image',

        ]);
        DB::table('games')->insert([
            'title' => 'Stellaris',
            'genre' => 'strategy',
            'price' => '60',
            'developer' => 'Paradox Interactive',
            'year' => '2018',
            'cover' => 'image',

        ]);
    }
}

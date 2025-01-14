<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'game_id' => '1',
            'user_id' => '1',
            'rating' => '4',
            'description' => 'nice game',

        ]);
        DB::table('comments')->insert([
            'game_id' => '1',
            'user_id' => '2',
            'rating' => '5',
            'description' => 'great game',

        ]);
        DB::table('comments')->insert([
            'game_id' => '2',
            'user_id' => '1',
            'rating' => '3',
            'description' => 'too scary',

        ]);
        DB::table('comments')->insert([
            'game_id' => '3',
            'user_id' => '2',
            'rating' => '5',
            'description' => 'perfect',

        ]);
        DB::table('comments')->insert([
            'game_id' => '4',
            'user_id' => '1',
            'rating' => '2',
            'description' => 'too boring',

        ]);
    }

    /*
       'game_id',
        'user_id',
        'rating',
        'description',
    */
}

<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MainGamesView extends Component
{

    public $games = [];
    public $title;
    public $genre;
    public $price;
    public $developer;
    public $year;
    public $cover;
    public $game_id;
    public $modal = false; 
    public $comments = [];
    public $comment;
    public $rating;
    public $description;
    public $gameComments = [];
    public function render()
    {
        $this->games = DB::table('games')->get();
        return view('livewire.main-games-view');
    }
    
    public function getGames()
    {
        $this->games = DB::table('games')->get();
    }
    public function getComments()
    {
        $this->comments = DB::table('comments')->get();
    }

    public function getGameComments($gameId)
    {
        $this->gameComments = Comment::where('game_id', '=', $gameId)->get();
    }
}

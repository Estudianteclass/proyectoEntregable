<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
//CRUD de los juegos
class GameComponent extends Component
{

    public $games = [];
    public $title;
    public $genre;
    public $price;
    public $developer;
    public $year;
    public $cover;
    public $game_id;
    public $modal = false; //añadir juegos con boton que abra un modal con formulario
    public $user;
    public $comments = [];
    public $comment;
    public $rating;
    public $description;
    public $gameComments = [];
    //borrado con boton, solo el admin
    public function render()
    {
        $this->games = DB::table('games')->get();
        return view('livewire.game-component');
    }
    public function mount()
    {
        $this->games = DB::table('games')->get();
        $this->getGames();
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
    public function closeModal()
    {
        $this->modal = false;
    }
    public function createGame()
    {

        $game = new Game();
        $game->title = $this->title;
        $game->genre = $this->genre;
        $game->price = $this->price;
        $game->developer = $this->developer;
        $game->year = $this->year;
        $game->save();
    }
    public function updateGame($id)
    {

        $game = Game::find($id);
        $game->update([
            'title' => $this->title,
            'genre' => $this->genre,
            'price' => $this->price,
            'developer' => $this->developer,
            'year' => $this->year,

        ]);
    }
    public function deleteGame(Game $game)
    {
        $game->delete();
        $this->getGames();
    }
    public function createComment($game_id)
    {
        /* Comment::create([
            'user_id' => auth()->id(),
            'game_id' => $game_id,
            'rating' => $this->rating,
            'descritpion' => $this->description,
        ]);*/
        $comment = new Comment();
        $comment->game_id = $game_id;
        $comment->user_id = auth()->id();
        $comment->rating = $this->rating;
        $comment->description = $this->description;
        $comment->save();
    }
    public function deleteComment(Comment $comment)
    {
        $comment->delete();
    }
}

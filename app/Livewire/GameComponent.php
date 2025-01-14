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
    public $viewModal = false;
    public $editModal = false;
    public $editGame = false;
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

        $this->gameComments = Comment::with('user')->where('game_id', '=', $gameId)->get();;
    }
    public function displayGame($game_id)
    {
        $game = DB::table('games')->where('id', '=', $game_id)->first();
        if ($game) {

            $this->title = $game->title;
            $this->genre = $game->genre;
            $this->developer = $game->developer;
            $this->year = $game->year;
            $this->price = $game->price;
            $this->getGameComments($game_id);
            $this->openViewModal();
        }
    }
    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }

    public function openViewModal()
    {
        $this->viewModal = true;
    }
    public function closeViewModal()
    {
        $this->viewModal = false;
    }
    public function clearFields()
    {

        $this->title = '';
        $this->genre = '';
        $this->developer = '';
        $this->year = '';
        $this->price = '';
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
        $this->clearFields();
        $this->getGames();
        $this->closeModal();
    }

    public function editGame($id)
    {

        $game = Game::find($id);
        if ($game) {

            $this->game_id = $game->id;
            $this->title = $game->title;
            $this->genre = $game->genre;
            $this->price = $game->price;
            $this->developer = $game->developer;
            $this->year = $game->year;
            $this->editGame = true;
        }
    }
    public function updateGame()
    {

        $game = Game::find($this->game_id);
        $game->update([
            'title' => $this->title,
            'genre' => $this->genre,
            'price' => $this->price,
            'developer' => $this->developer,
            'year' => $this->year,

        ]);
        $this->editGame = false;
        $this->getGames();
        $this->closeEditModal();
        $this->clearFields();
    }
    public function openEditModal($id)
    {

        $this->editModal = true;
        $this->editGame($id);
        
    }
    public function closeEditModal()
    {

        $this->editModal = false;
    }
    public function deleteGame($gameId)
    {
        $game = Game::find($gameId);
        if ($game) {
            $game->delete();
            $this->getGames();
        }
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
        $this->getComments();
    }
}

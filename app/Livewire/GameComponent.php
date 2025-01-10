<?php

namespace App\Livewire;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
//CRUD de los juegos
class GameComponent extends Component
{

    public $games=[];
    public $title;
    public $genre;
    public $price;
    public $developer;
    public $year;
    public $cover;
    public $game_id;
    public $modal = false; //añadir juegos con boton que abra un modal con formulario
    public $user;
    //borrado con boton, solo el admin
    public function render()
    {
        $this->games = DB::table('games')->get();
        return view('livewire.game-component');
    }


    /*
    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        $this->user = Auth::user()->name;
        $this->getGames();
    }*/

    public function getGames()
    {
        $this->games = DB::table('games')->get();
    }

    public function closeModal() {
        $this->modal=false;
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
    public function editGame($id) {}
    public function deleteGame(Game $game)
    {
        $game->delete();
        $this->getGames();
    }
}

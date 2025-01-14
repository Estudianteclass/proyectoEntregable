
    {{--Poner juegos en vista cuadricula--}}
    {{-- Because she competes with no one, no one can compete with her. --}}

<div>
    
      <input type="button" value="Add new videogame" class="bg-green-700 px-2 py-2 rounded-md text-white font-bold ms-32 mt-4 mb-4 hover:bg-green-800" wire:click="openModal">    
  
 <div class="grid gap-3 lg:grid-cols-3 lg:gap-3">   
 
@foreach ($games as $game)
    



    <div class="flex flex-col max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 justify-self-center w-64 h-64">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$game->title}}</h5>
      
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Genre: {{$game->genre}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Developer: {{$game->developer}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Release: {{$game->year}}</p>
        <div class="flex space-x-1">
             <button class="mt-auto w-24 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" wire:click="openEditModal({{$game->id}})">
            Edit
        </button>
        <button class="mt-auto w-24 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:red-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" wire:click="deleteGame({{$game->id}})" wire:confirm="Are you sure do you wish to delete this game?">
            Delete
        </button>
        <button class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="displayGame({{$game->id}})">
         Details
      </button>
        </div>
       
    </div>
    

@endforeach


 </div>
 @if ($modal)
 <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
      <div class="w-full">
        <div class="m-8 my-20 max-w-[400px] mx-auto">
          <div class="mb-8">
            <h1 class="mb-4 text-3xl font-extrabold">Add new game </h1>
            <form class="flex flex-col justify-center space-y-1">
                <label for="title">Title:</label>
                <input type="text" wire:model="title" name="title" id="title" class="rounded-md h-8">
                <label for="title">Genre:</label>
                <input type="text" wire:model="genre" name="genre" id="genre" class="rounded-md h-8">
                <label for="title">Developer:</label>
                <input type="text" wire:model="developer" name="developer" id="developer" class="rounded-md h-8">
                <label for="title">Release:</label>
                <input type="text" wire:model="year" name="release" id="release" class="rounded-md h-8">
                <label for="title">Price:</label>
                <input type="number" wire:model="price" name="price" id="price" class="rounded-md h-8">
                
            </form>
          </div>
          <div class="flex space-x-2">
            <button class="p-2 bg-black border rounded-full text-white w-full font-semibold"wire:click="createGame">Add game</button>
            <button class="p-2 bg-white border rounded-full w-full font-semibold" wire:click="closeModal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>    
 @endif
 @if ($viewModal)
<div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
      <div class="w-full">
        <div class="m-8 my-20 max-w-[400px] mx-auto">
          <div class="mb-8">
            <h1 class="mb-4 text-3xl font-extrabold">Game information</h1>
                <p class="text-black">Title:{{$title}}</p>
                <p class="text-black">Genre:{{$genre}}</p>
                <p class="text-black">Developer:{{$developer}}</p>
                <p class="text-black">Release:{{$year}}</p>
                <p class="text-black">Price:{{$price}}</p>
          </div>
          <h3 class="mt-3 text-lg font-bold">Comments</h3>
          @foreach ( $gameComments as $comment )
                 <div class="border-t">
            <p class="text-black">User:{{$comment->user->name}}</p>
            <p class="text-black">Comment:{{$comment->description}}</p>
            <p class="text-black">Rating:{{$comment->rating}}</p>

          </div>
          @endforeach
       
          <div class="flex space-x-2 justify-center">
            <button class="p-2 bg-black border rounded-full text-white w-48 font-semibold " wire:click="closeViewModal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@if ($editModal)
 <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
      <div class="w-full">
        <div class="m-8 my-20 max-w-[400px] mx-auto">
          <div class="mb-8">
            <h1 class="mb-4 text-3xl font-extrabold">Edit the game information </h1>
            <form class="flex flex-col justify-center space-y-1">
                <label for="title">Title:</label>
                <input type="text" wire:model="title" name="title" id="title" class="rounded-md h-8">
                <label for="title">Genre:</label>
                <input type="text" wire:model="genre" name="genre" id="genre" class="rounded-md h-8">
                <label for="title">Developer:</label>
                <input type="text" wire:model="developer" name="developer" id="developer" class="rounded-md h-8">
                <label for="title">Release:</label>
                <input type="text" wire:model="year" name="release" id="release" class="rounded-md h-8">
                <label for="title">Price:</label>
                <input type="number" wire:model="price" name="price" id="price" class="rounded-md h-8">
                
            </form>
          </div>
          <div class="flex space-x-2">
            <button class="p-2 bg-black border rounded-full text-white w-full font-semibold"wire:click="updateGame">Update game</button>
            <button class="p-2 bg-white border rounded-full w-full font-semibold" wire:click="closeEditModal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>    
 @endif
 <footer class="h-12"></footer>
  </div>



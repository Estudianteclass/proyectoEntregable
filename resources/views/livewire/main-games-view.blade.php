<div class="grid gap-3 lg:grid-cols-3 lg:gap-3">
    @foreach ($games as $game)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
       
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$game->title}}</h5>
        
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Genre: {{$game->genre}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Developer: {{$game->developer}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: {{$game->price}} €</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Release: {{$game->year}}</p>
       
        <button class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="displayGame({{$game->id}})">
            Details
        </button>
     
    </div>
@endforeach
@if ($modal)
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
            <button class="p-2 bg-black border rounded-full text-white w-48 font-semibold " wire:click="closeModal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
</div>

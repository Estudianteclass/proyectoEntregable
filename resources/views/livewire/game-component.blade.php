
    {{--Poner juegos en vista cuadricula--}}
    {{-- Because she competes with no one, no one can compete with her. --}}

<div>
     <input type="button" value="Add new videogame" class="bg-green-700 px-2 py-2 rounded-md text-white font-bold"> 
 <div class="grid grid-cols-3 gap-4 justify-center">   
 
@foreach ($games as $game)
    



    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$game->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Genre:{{$game->genre}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Developer:{{$game->developer}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Release: {{$game->year}}</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Details
           
        </a>
    </div>
    

@endforeach


 </div>

 
  </div>



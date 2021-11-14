	<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
  		@foreach($vacancie as $item)
          <li class="p-10  border border-gray-300 bg-white shadow"> 
              <h2 class="text-2xl font-bold text-green-500"> {{ $item->title }} </h2>
              <p class="block text-gray-700 font-normal my-2">
              	{{ $item->categorie->name }}
              </p> 
              <p class="block text-gray-700 font-normal my-2">
              	Ubicacion :
              	<span class="font-bold"> {{ $item->ubication->name }} </span>
              </p> 
              <p class="block text-gray-700 font-normal my-2">
              	Experiencia :
              	<span class="font-bold"> {{ $item->experience->name }} </span>
              </p>
              <a class="bg-green-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm " href="{{ route('vacantes.show', $item->id) }}">
              	 Ver Vacante </a>
          </li>
  		@endforeach
    </ul>
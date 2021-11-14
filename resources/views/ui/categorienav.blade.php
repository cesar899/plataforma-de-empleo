@foreach ($categorie as $item)
<a class="text-white text-sm uppercase font-bold p-3" href="{{ route('categorie.show',$item->id) }}"> {{$item->name}} </a>

@endforeach
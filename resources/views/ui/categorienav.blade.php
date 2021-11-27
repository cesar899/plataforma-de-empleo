@foreach ($categorie as $item)
<nav class=" md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center uppercase">
  <a href="{{ route('categorie.show',$item->id) }}"> {{$item->name}} </a>
</nav>
@endforeach
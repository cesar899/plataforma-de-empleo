@extends('layouts.app')

@section('navegacion')

 @include('ui.adminnav')

@endsection

@section('content')
  <h1 class="text-2xl text-center mt-10">Notificaciones</h1>

  @if (count($notifications) > 0)
    <ul class="mx-w-md mx-auto mt-10"> 
	    @foreach($notifications as $item)
	       @php
	          $data = $nontifications->data
	       @endphp

           <li class="p-5 border border-gray-400 mb-5">
           	 <p class="mb-4">
             	 	Tienes un nuevo candidato en:
             	 	<span class="font-bold"> {{ $data['vacancie'] }}</span>
           	 </p>
             <p class="mb-4">
                Te escrfibio:
                <span class="font-bold"> {{ $item->created_at->diffForHumans }}</span>
             </p>
             <a href="{{ route('candidate.index', $data->id_vacancie) }}" class="mb-4">
              Ver Candidato
             </a>


           </li>

	    @endforeach
    </ul>

  @else
    <p class="text-center mt-5">No tienes notificaciones</p>
  @endif
@endsection
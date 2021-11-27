@extends('layouts.app')

@section('navegacion')
  @include('ui.categorienav')
@endsection

@section('content')	
	@if(count($vacancie) > 0)
		 <a href="{{ route('inicio') }}" type="buttom" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10 rounded">atras</a>
		
	  	<div class="my-10 bg-gray-100 p-10 shadow">	
	  		<h1 class="text-3xl text-gray-700 m-0">
		  	Resultados de la busqueda	
	  	</h1>
		    @include('ui.ListadoVacantes')
		</div>
    @else
      <p class="text-center text-gray-700">No hay vacantes disponible de tu busqueda</p>
    @endif
@endsection
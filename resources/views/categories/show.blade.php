
@extends('layouts.app')

@section('navegacion')
  @include('ui.categorienav')
@endsection

@section('content')
    @if(count($vacancie) > 0)
		
		<div class="my-10 bg-gray-100 p-10 shadow">
		
		  	<h1 class="text-3xl text-gray-700 m-0">
		  		Categorias :	
		  		<span class="text-green-500 block"></span>
		  	</h1>
		    @include('ui.ListadoVacantes')
	    </div>
    @else
      <p class="text-center text-gray-700">No hay vacantes disponible de tu busqueda</p>
    @endif	

@endsection
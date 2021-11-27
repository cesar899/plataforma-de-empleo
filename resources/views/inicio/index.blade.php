@extends('layouts.app')

@section('navegacion')
@include('ui.categorienav')
@endsection

@section('content')

<div class="flex flex-col lg:flex-row shadow bg-white  m-8 mt-20 ">
	<div class="lg:w-1/2 px-6 p-8">
		<h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
			Encuentra un empleo remoto o en tu país
			<span class="text-green-500 block mt-6">Para Desarrolladores / Diseñadores Web</span>
		</h1>
		@include('ui.buscar')
	</div>
	<div class="block lg:w-1/2">
		<img class="inset-0 h-full w-full object-cover" src="{{ asset('img/imagen.jpg') }}" alt="devjobs">	
	</div>
</div>

<div class="my-10 bg-gray-100 p-10 shadow">
	<h1 class="text-3xl text-gray-700 m-0">
		Nuevas
		<span class="font-bold">Vacantes</span>
	</h1>
	@include('ui.ListadoVacantes')
</div>  
@endsection
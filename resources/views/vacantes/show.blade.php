@extends('layouts.app') 

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

@if(Auth::user())
 <a href="{{ route('vacantes.index') }}" type="buttom" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10 rounded">atras</a> 
@else
  <a href="{{ route('inicio') }}" type="buttom" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10 rounded">atras</a> 
@endif

 <h1 class="text-3xl text-center mt-10">vacante : {{$vacancie->title}}</h1>
  <div class="mt-10 mb-20 md:flex items-start">
     <div class="md:w-3/5">
        <p class="block text-gray-700 font-bold my-2">
           Reclutador : <span>{{$vacancie->recruiters->name }}</span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
           Publicado : <span>{{$vacancie->created_at->diffForhumans() }}</span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
           Categoria : <span>{{$vacancie->categorie->name}}</span>
        </p> 
        <p class="block text-gray-700 font-bold my-2">
           Salario : <span>{{$vacancie->salary->name}}</span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
           Ubicacion : <span>{{$vacancie->ubication->name}}</span>
        </p> 
        <p class="block text-gray-700 font-bold my-2">
           Experiencia : <span>{{$vacancie->experience->name}}</span>
        </p>
        <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Conocimientos y Tecnologias</h2>
        @php
           $ArraySkills = explode(",", $vacancie->skills)
        @endphp
        @foreach($ArraySkills as $skills)
           <p class="inline-block py-2 px-8 text-gray-700 rounded border border-gray-500 my-2">
              {{ $skills }}
           </p> 
        @endforeach 
        {{-- lightbox2 --}}
        <a href="/storage/vacantes/{{$vacancie->image}}" data-lightbox="image" data-title="Vacante {{$vacancie->title}}">
           <img src="/storage/vacantes/{{$vacancie->image}}" class="mt-10" height="100px" width="200px">
        </a>
        <div class="description mt-10 mb-5">
           {!! $vacancie->description !!}
        </div>
      </div>
      @if($vacancie->Activa === 0)
       @include('ui.contacto')
      @else
        <div class="py-10 mt-20">
          <div class="mt-20">
            <h1 class="text-3xl text-center"> Vacante no disponible (Inactiva)</h1>   
          </div>
        </div>
      @endif
   </div>     
@endsection
@extends('layouts.app')

@section('navegacion')
 @include('ui.adminnav')
@endsection

@section('content')
<h1 class="text-2xl text-center mt-10">Administrar Vacantes</h1>
@if(count($vacantes) > 0 )
<div class="flex flex-col mt-10">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-500">
            <table class="min-w-full">
                <head class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-700">
                          TITULO DE VACANTE
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-700">
                          ESTADO
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-700">
                            CANDIDATOS
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-700">
                          ACCIONES
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($vacantes as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$item->title }}</div>
                                        <div class="text-sm leading-5 font-medium text-gray-900">Categoria : {{$item->categorie->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                             <status-vacancie
                                 estado = "{{$item->activa}}"
                                 vacancie-id="{{$item->id}}">
                             </status-vacancie>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-500">
                              <a href="{{ route('candidates.index', $item->id) }}" class="text-gray-500 hover:text-gray-600">
                              {{$item->candidate->count()}}  Candidatos</a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 font-medium">
                                <a href="{{ route('vacantes.edit', $item->id) }}" class="text-green-600 hover:text-blue-900 mr-5">Editar</a>

                                <delete-vacancie
                                vacancie-id={{$item->id}}
                                ></delete-vacancie>

                                <a href="{{ route('vacantes.show', $item->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div> 
</div>

{{ $vacantes->links() }}
@else
 <p class="text-center mt-10 text-gray-700">No tienes Vacantes aún</p>
@endif
@endsection
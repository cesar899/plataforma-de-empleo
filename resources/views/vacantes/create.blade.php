@extends('layouts.app')

@section( 'styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
@endsection

@section('navegacion')
@include('ui.adminnav')
@endsection

@section('content')
<h1 class="text-2xl text-center mt-10">Nueva vacante</h1>
<form class="max-w-lg mx-auto my-10" action="{{ route('vacantes.store') }}" method="POST">
   @csrf
   <div class="mb-5">
      <label for="title" class="block text-gray-700 text-sm mb-2">Titulo vacante:</label>
      <input id="title" type="text" class="p-3 bg-gray-100 rounded form-input w-full 
         border-gray-600 border @error('title') border-red-500 border @enderror" placeholder="titulo de la vacante" name="title" value="{{ old('title') }}">

      @error('title')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>

   <div class="mb-5">
      <label for="categorie" class="block text-gray-700 text-sm mb-2">Categoria:</label>
      <select id="categorie" class="rounded appearance-none w-full border border-gray-600 border text-gray-700 rounend leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="categorie">
         <option disabled selected>--Seleccione--</option>
         @foreach($categories as $item)
         <option {{old('categorie') == $item->id ? 'selected' : ''}} value="{{$item->id}}">
            {{$item->name}}
         </option>
         @endforeach
      </select>
      @error('categorie')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <div class="mb-5">
      <label for="experience" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
      <select id="experience" class="block appearance-none w-full border border-gray-600 border text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="experience">
         <option disabled selected>--Seleccione--</option>
         @foreach($experiences as $item)
         <option {{old('experience') == $item->id ? 'selected' : ''}} value="{{$item->id}}">
            {{$item->name}}
         </option>
         @endforeach
      </select>
      @error('experience')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <div class="mb-5">
      <label for="ubication" class="block text-gray-700 text-sm mb-2">Ubicacion:</label>
      <select id="ubication" class="block appearance-none w-full border border-gray-600 border text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="ubication">
         <option disabled selected>--Seleccione--</option>
         @foreach($ubications as $item)
         <option {{old('ubication') == $item->id ? 'selected' : ''}} value="{{$item->id}}">
            {{$item->name}}
         </option>
         @endforeach
      </select>
      @error('ubication')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <div class="mb-5">
      <label for="salary" class="block text-gray-700 text-sm mb-2">Salario:</label>
      <select id="salary" class="block appearance-none w-full border border-gray-600 border text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="salary">
         <option disabled selected>--Seleccione--</option>
         @foreach($salary as $item)
         <option {{old('salary') == $item->id ? 'selected' : ''}} value="{{$item->id}}">
            {{$item->name}}
         </option>
         @endforeach
      </select>
      @error('salary')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <div class="mb-5">
      <label for="description" class="block text-gray-700 text-sm mb-2">Descripcion del Puesto :</label>
      <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
      <input type="hidden" name="description" id="description" value="{{ old('description') }}">
      @error('description')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <div class="mb-5">
      <label for="image" class="block text-gray-700 text-sm mb-2">Imagen de la Vacante :</label>
      <div id="dropzoneDevJobs" class="dropzone rounded  bg-gray-100"></div>
      <input type="hidden" name="image" id="image" value="{{ old('image')}}">
      @error('image')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
      <p id="error"></p>
   </div>
   <div class="mb-5">
      <label for="skills" class="block text-gray-700 text-sm mb-5">Habilidades y Conocimientos : <span class="text-xs"> ( Elige al menos 3 ) </span></label>
      @php
      $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS','React Hooks', 'ReactJS', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Dend', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
      @endphp
      {{-- Cuando sea un arreglo pasar los : y Cuando sea string no amerita los : --}}
      <list-skills :skills="{{ json_encode($skills) }}" :oldskills="{{ json_encode( old('skills') ) }}"></list-skills>
      @error('skills')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block"> {{ $message }}</span>
      </div>
      @enderror
   </div>
   <button type="submit" class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline focus:shadow-outline uppercase font-bold ">
      Publicar Vacante
   </button>
</form>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
  Dropzone.autoDiscover = false ;
     document.addEventListener('DOMContentLoaded', () => {
      
        //Medim Editor//
       const editor = new MediumEditor('.editable', {
          toolbar : {
             buttons : ['bold', 'italic', 'underline','quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
             static : true,
             sticky : true,
         },
         placeholder : {
            text : 'Informacion de la Vacante'
         }
       });
       //Agrega al input hidde lo que el usuario agrega en mediun editor
       editor.subscribe('editableInput', function(eventObj, editable) {
          const contenido =  editor.getContent();
          document.querySelector('#description').value = contenido;
       })
       //llena el editor con el contenido del input hidden
       editor.setContent( document.querySelector('#description').value );

       //dropzone//  
       const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
          //url a dode se va a dirigir la imagen
          url: "vacantes/image",
          //cambiar placeholder a español
          dictDefaultMessage: 'Sube tu archivo',
          //Que acepte solo imagenes
          acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp", 
          //para eliminar foto asignada
          addRemoveLinks: true, 
          //asignar nombre al remove
          dictRemoveFile: 'eliminar archivo',
          maxFiles: 1,
          headers:{
             'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
          },
          init: function() {
            if(document.querySelector('#image').value.trim() ) {
               let imagePublic = {};
               imagePublic.size = 123456;
               imagePublic.name = document.querySelector('#image').value;
               document.querySelector('#image').value;

               //Para agregarlo a dropzone
               this.options.addedfile.call(this, imagePublic);
               this.options.thumbnail.call(this, imagePublic, `/storage/vacantes/${imagePublic.name}`);
              
               imagePublic.previewElement.classList.add('dz-success');
               imagePublic.previewElement.classList.add('dz-complete');
               
            }
          },
          success: function(file, response) {
             //para probar que se suban correctamente en el servidor
             //console.log(response.correcto);
             //llevar aviso de valido al input
             document.querySelector('#error').textContent = '';

             //Coloca la respuesta del servidor al input hidden
              document.querySelector('#image').value = response.correcto;

             //Añadir el objeto de archivo el nombre del servidor
             file.nameServer = response.correcto; 
          },
          //funcion para aceptar solo 1 imagen
          maxfilesexceeded: function(file) {
             //if para que borre una imagen al querer subir 2
             if( this.files[1] != null ) {
                this.removeFile(this.files[0]); //Elimina el archivo anterior
                this.addFile(file); //Esto agrega el nuevo archivo
             }
          },
          removedfile: function(file, response) {
             console.log('el archivo fue borrado: ', file);
             file.previewElement.parentNode.removeChild(file.previewElement);
                
             params = {
                image: file.nameServer  
             }
            
             //eliminar archivo
             axios.post('vacantes/remove', params )
               .then(respuesta => console.log(respuesta)) 
            }
         });
      });
   </script>
@endsection
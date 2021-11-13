<aside class="md:w-2/5 bg-green-500 p-5 rounded m-3">
   <h2 class="text-2xl my-5 text-white uppercase text-center">Contacta al Reclutador</h2>
   <form action="{{route('candidatos.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
           <label for="name" class="block text-white text-sm font-bold mb-4">
               Nombre :
           </label>
           <input id="name" type="text" class="p-3  bg-gray-100 rounded form-input w-full @error('name') border border-red-500 @enderror" name="name" placeholder="ingresa tu nombre" value="{{ old('name') }}">
           @error('name')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full rounded mt-5" role="alert">
                    <span class="block"> {{ $message }}</span>
                </div>
            @enderror
      </div>
      <div class="mb-4">
           <label for="email" class="block text-white text-sm font-bold mb-4">
               Email :
           </label>
           <input id="email" type="email" class="p-3  bg-gray-100 rounded form-input w-full @error('email') border border-red-500 @enderror" name="email" placeholder="ingresa tu Correo" value="{{ old('email') }}">
           @error('email')
               <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full rounded mt-5" role="alert">
                   <span class="block"> {{ $message }}</span>
                </div>
           @enderror
      </div>
      <div class="mb-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4">
               Curriculum (PDF) :
            </label>
            <input id="cv" type="file" class="rounded form-input w-full @error('cv') border border-red-500 @enderror" name="cv" accept="application/pdf">
            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full rounded mt-5" role="alert">
                    <span class="block"> {{ $message }}</span>
                </div>
            @enderror
      </div>
      <input type="hidden" name="vacancie_id" value="{{$vacancie->id}}">
       <input type="submit" class="bg-green-600 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase" value="Contactar">
  </form>
</aside>

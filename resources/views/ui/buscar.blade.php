<h2 class="my-6 text-2xl text-gray-700">Buscar vacante:</h2>

<form action="{{ route('vacantes.search') }}" method="POST">
  @csrf
  <div class="mb-5">
    <label for="categorie" class="block text-gray-700 text-sm mb-2">Categoria:</label>
    <select id="categorie" class="rounded appearance-none w-full border border-gray-600 border text-gray-700 rounend leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100" name="categorie">
      <option disabled selected>--Seleccione--</option>
      @foreach($categorie as $item)
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
  <button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10">
    Buscar Vacantes
  </button>
</form>
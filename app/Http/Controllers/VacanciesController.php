<?php

namespace App\Http\Controllers;


use auth;
use App\Models\Salarie;
use App\Models\Vacancie;
use App\Models\Categorie;
use App\Models\Ubication;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanciesController extends Controller
{

    public function __construct()
    {
        //eliminar constructor al finalizar el projecto
        //Revisar que el usuario este autenticado y verificado// 
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vacantes = auth()->user()->vacantes;
        $vacantes = vacancie::where('user_id', auth()->user()->id)->latest()->Paginate(3);
        
       return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cosulta a la bd
        $categories = Categorie::all();
        $experiences = Experience::all();
        $ubications = Ubication::all();
        $salary = Salarie::all();
        
        return view('vacantes.create', compact('categories','experiences','ubications', 'salary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([
          'title' => 'required|min:8',
          'categorie' => 'required',
          'experience' => 'required',
          'ubication' => 'required',
          'salary' => 'required',
          'description' => 'required|min:50',
          'image' => 'required',
          'skills' => 'required',
        ]);

        // Almacenar vacante en la bd 
        auth()->user()->vacantes()->create([
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
            'skills' => $data['skills'],
            'categorie_id' => $data['categorie'],
            'experience_id' => $data['experience'],
            'ubication_id' => $data['ubication'],
            'salary_id' => $data['salary'],
        ]);

       return redirect( route('vacantes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancie $vacancie, $id)
    {
      $vacancie = vacancie::find($id);  
      
      return view('vacantes.show', compact('vacancie'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancie $vacancie)
    {
        $this->authorize('view', $vacancie);
          //Cosulta a la bd
        $categories = Categorie::all();
        $experiences = Experience::all();
        $ubications = Ubication::all();
        $salary = Salarie::all();

        return view('vacantes.edit', compact('vacancie','categories','experiences','ubications', 'salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancie $vacancie)
    {
        $this->authorize('update', $vacancie);
        //Validacion
        $data = $request->validate([
          'title' => 'required|min:8',
          'categorie' => 'required',
          'experience' => 'required',
          'ubication' => 'required',
          'salary' => 'required',
          'description' => 'required|min:50',
          'image' => 'required',
          'skills' => 'required',
        ]);

        // Almacenar vacante en la bd 
      
            $vacancie->title = $data['title'];
            $vacancie->image = $data['image'];
            $vacancie->description = $data['description'];
            $vacancie->skills = $data['skills'];
            $vacancie->categorie_id = $data['categorie'];
            $vacancie->experience_id = $data['experience'];
            $vacancie->ubication_id = $data['ubication'];
            $vacancie->salary_id = $data['salary'];

            $vacancie->save();

            return redirect( route('vacantes.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancie $vacancie)
    {
       $this->authorize('delete', $vacancie);
      //return response()->json($vacancie);
        $vacancie->delete();
        return  response()->json(['mensaje' => 'Se elimino la vacante ' . $vacancie->title]);
    }
    //Campos extras
    public function image(Request $request)
    {    
        //Lee el archivo
        $image = $request->file('file');
        //Toma la extansion ygenera un nombre 
        $nombreImage = time() . '.' . $image->extension();
        //Mueve el archivo temporal a la carpeta storage/vacantes con el nombre
        $image->move(public_path('storage/vacantes'), $nombreImage);
        return response()->json(['correcto' =>  $nombreImage ]);
    }

    //Borrar imagen Via Ajax
    public function removeImage(Request $request)
    {
        if(  $request->ajax()) {
           $image = $request->get('image');
             //Verifica si la imagen existe
             if(File::exists('storage/vacantes/'. $image ) ){
                File::delete( 'storage/vacantes/'. $image );
            } 

            return response('Imagen Eliminada', 200);
        }
    }
    //cambia el estado de una vacante
    public function status(Request $request, Vacancie $vacancie)
    {

      //Leer nuevo estado y asignarlo
      $vacancie->activa = $request->estado;
      //guardarlo a la bd  
      $vacancie->save();

      return response()->json(['respuesta' => 'correcto']);  
    }
    public function search(Request $request)
    {
       //Validar 
       $data = $request->validate([
       'categorie' => 'required',
       'ubication' => 'required'
       ]);

       //Asignar valor

       $categorie = $data['categorie'];
       $ubication = $data['ubication'];
       
       //fomar 1
      // $vacancie = Vacancie::latest()
    //           ->where('categorie_id', $categorie)
      //         ->where('ubication_id', $ubication)
        //       ->get();

       // forma 2
       $vacancie = Vacancie::where([
        'categorie_id'=> $categorie,
        'ubication_id' => $ubication
       ])->get();

      return view('search.index',compact('vacancie'));
    }

    public function result()
    {
      return "mostrano";
    }
}



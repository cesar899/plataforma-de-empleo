<?php

namespace App\Http\Controllers;

use App\Models\Vacancie;
use App\Models\candidate;
use Illuminate\Http\Request;
use App\Notifications\NewCandidate;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //Obtener el id actual 
      // dd(d);
      $id_vacancie = $request->route('id');
       
    //Obtener los candidatos y las vancantes 

    $vacancie = Vacancie::findOrFail($id_vacancie);
    $this->authorize('view', $vacancie);

    // dd($vacancie);
    return view('candidates.index', compact('vacancie')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:4000',
            'vacancie_id' => 'required'
        ]);

      

        // Almacenar Archivo pdf
        if($request->file('cv')){
            $archivo = $request->file('cv');
            $NombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubication = public_path('/storage/cv');
            $archivo->move($ubication, $NombreArchivo);
        }

      
         //forma 1
       // $candidate = new candidate();
        //$candidate->name = $data['name'];
       // $candidate->email = $data['email'];
       // $candidate->cv = $NombreArchivo;
       // $candidate->vacancie_id = $data['vacancie_id'];

       // $candidate->save();

       $vacancie = Vacancie::find($data['vacancie_id']);

        $vacancie->candidate()->create([
          'name' => $data['name'],
          'email' => $data['email'],
          'cv' => $NombreArchivo,
       ]);
     

         $recruiters = $vacancie->recruiters;
         $recruiters->notify( new NewCandidate( $vacancie->title,$vacancie->id) );

        //forma 2 pero tiene que tener los campos de la bd el modelo
        // $candidate = new candidate($data);
        // $candidate->save();

         return back()->with('msj', 'Tus datos se registraron Correctamente! Suerte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(candidate $candidate)
    {
        //
    }
}

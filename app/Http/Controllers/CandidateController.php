<?php

namespace App\Http\Controllers;

use App\Models\Vacancie;
use App\Models\candidate;
use Illuminate\Http\Request;
use App\Notifications\NewCandidate;
use Illuminate\Support\Facades\Log;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
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
            'cv' => 'required',
            'vacancie_id' => 'required'
        ]);

      

        // Almacenar Archivo pdf
        if($request->file('cv'))
        {
           $archivo = $request->file('cv');
           $nombreArchivo = time() . "." . $request->file('cv')->extension();
           $ubicacion = public_path('storage\cv');
           $archivo->move($ubicacion, $nombreArchivo);
        }

         $vacancie = Vacancie::find($data['vacancie_id']);

        $vacancie->candidate()->create([
          'name' => $data['name'],
          'email' => $data['email'],
          'cv' => $nombreArchivo,
       ]);

       
        $recruiters = $vacancie->recruiters;
        $recruiters->notify( new NewCandidate($vacancie->title, $vacancie->id) );
       

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

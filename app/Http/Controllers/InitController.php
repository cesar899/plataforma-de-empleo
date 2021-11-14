<?php

namespace App\Http\Controllers;

use App\Models\Vacancie;
use App\Models\ubication;
use App\Models\categorie;
use Illuminate\Http\Request;

class InitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $vacancie = Vacancie::latest()->where('activa', '=', '0')->take(10)->get();
        $ubications = ubication::all();

        return view('inicio.index', compact('vacancie','ubications'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\inscripciones;
use App\Models\Races;
use App\Models\User;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        $g_carrera = Races::find($id);
        //dd($g_carrera->id);


        return view('inscripciones', compact('g_carrera'));
    }
    public function store(Request $request)
    {
        $inscripcion = new inscripciones();
        $dorsal = inscripciones::GetMaxDorsal();

        $inscripcion->dni = $request->dni;
        $inscripcion->carrera = $request->carrera;
        if (!empty($dorsal->dorsal)) {
            $inscripcion->dorsal = $dorsal->dorsal + 1;
        } else {
            $inscripcion->dorsal = 1;
        }
        $inscripcion->save();
        return redirect()->route("carreras.show", $request->carrera);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\inscripciones;
use App\Models\Races;
use App\Models\User;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{

    public function index(Request $request)
    {

        if (session()->has('user')) {
            if (!empty(session('user'))) {
                //$result = inscripciones::JoinUserToInscr();
                $inscr = inscripciones::join('users', 'inscripciones.dni', '=', 'users.dni')
                    ->join('races', 'inscripciones.carrera', '=', 'races.id')
                    ->get(['users.*', 'inscripciones.*', 'races.*']);
                //dd($inscr);
                return view('mis_carreras', compact('inscr'));
            }
        }
    }

    public function create(Request $request, $id)
    {

        $isLogged = false;

        if (session()->has('user')) {
            if (!empty(session('user'))) {

                $g_carrera = Races::find($id);
                return view('inscripciones', compact('g_carrera'));
            }
        }


        return redirect()->route('login')
            ->with('error', 'You are not allowed to access this page.');


        //dd($g_carrera->id);



    }

    public function store(Request $request)
    {
        //dd($request);
        $inscripcion = new inscripciones();
        $dorsal = inscripciones::GetMaxDorsal();

        $inscripcion->dni = $request->dni;
        $inscripcion->carrera = $request->carrera;
        if (!empty($dorsal->dorsal)) {
            $inscripcion->dorsal = $dorsal->dorsal + 1;
        } else {
            $inscripcion->dorsal = 1;
        }
        /* $inscripcion->C_postal = $request->C_postal;
        $inscripcion->Poblacion = $request->Poblacion; */
        $inscripcion->save();
        return redirect()->route("carreras.show", $request->carrera);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\inscripciones;
use App\Models\Races;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{

    public function index(Request $request)
    {

        if (session()->has('user')) {
            if (!empty(session('user'))) {
                if (session('user')->type_user == 'A') {
                    $inscr = inscripciones::join('users', 'inscripciones.dni', '=', 'users.dni')
                        ->join('races', 'inscripciones.carrera', '=', 'races.id')
                        ->get(['users.*', 'inscripciones.*', 'races.*']);
                } else {
                    $inscr = inscripciones::join('users', 'inscripciones.dni', '=', 'users.dni')
                        ->join('races', 'inscripciones.carrera', '=', 'races.id')
                        ->where('users.dni', session('user')->dni)
                        ->get(['users.*', 'inscripciones.*', 'races.*']);
                }
                return view('mis_carreras', compact('inscr'));
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'You are not allowed to access this page.');
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
    }

    public function store(Request $request)
    {
        try{
        $inscripcion = new inscripciones();
        $inscrit = inscripciones::GetInscripcio(session('user')->dni, $request->carrera);
        //dd(count($inscrit));

        if(count($inscrit)==0){
            $inscripcion->dni = session('user')->dni;
            $inscripcion->carrera = $request->carrera;
            if(empty($request->dorsal)){
                $dorsal = inscripciones::GetMaxDorsal($request->carrera);
                if (!empty($dorsal->dorsal)) {
                    $agafat=1;
                    while( $agafat==0 ){
                        $i=1;
                        $dorsalAgafat = inscripciones::GetDorsal($i, $request->carrera);
                        if(empty($dorsalAgafat)){
                            $agafat=0;
                        }else{
                            $i++;
                        }
                    }
                    $inscripcion->dorsal = $dorsal->dorsal + 1;
                } else {
                    $inscripcion->dorsal = 1;
                }
            }else{
                $dorsalAgafat = inscripciones::GetDorsal($request->dorsal, $request->carrera);
                //dd($dorsalAgafat);
                if (empty($dorsalAgafat)){
                    $inscripcion->dorsal = $request->dorsal;
                }else{
                    return redirect()->back()
                    ->with('error', 'Este dorsal ya esta elegido.');
                }

            }
            $inscripcion->save();
            return redirect()->route("carreras.show", $request->carrera)
            ->with('success', 'Se ha inscrito correctamente.');
        }else{
            return redirect()->back()
                ->with('error', 'Ja estas inscrit.');
        }
    }catch(Exception $e){
        return redirect()->back()
            ->with('error', 'Se ha producido un error al  inscribirse.');
    }

    }

    public function destroy($carrera, $dorsal)
    {
        try{

            $new = inscripciones::ReturnInscripcion($carrera, $dorsal);
            $new->delete();

            return redirect('/mis_carreras')
            ->with('success', 'Se ha desinscrito correctamente.');
        }catch(Exception $e){
            return redirect()->back()
            ->with('error', 'No se ha podido desincribir. Vuelve a intentarlo.');
        }
    }

}

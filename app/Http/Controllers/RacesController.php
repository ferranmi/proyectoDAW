<?php

namespace App\Http\Controllers;

use App\Models\Races;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RacesController extends Controller
{

    public function index(Request $request)
    {

        $races = Races::ReturnAll();

        $admin = $this->isAdmin();



        return view('carreras', compact('races', 'admin'));
    }

    public function create()
    {

        $admin = $this->isAdmin();

        if ($admin == true) {
            return view('nova_carrera');
        } else {
            //abort(403);
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
    }

    public function store(Request $request)
    {

        $race = new Races();

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'distance'  => 'required|numeric',
            'time_start'  => 'required|date',
            "file" => 'required',
        ]);
        try{

            $codigo = Races::GetMaxId();
            if (!empty($codigo->id)) {
                $race->id = $codigo->id + 1;
            } else {
                $race->id = 1;
            }

            $race->code = $race->id;
            $race->name = $request->name;
            $race->descripcion = $request->descripcion;
            $race->distance  = $request->distance;
            $race->time_start  = $request->time_start;
            $race->image = $request->file('file')->store('public');

            $race->save();
            return redirect()->route("carreras.show", $race)
            ->with("success", "Carrera creada satisfactoriamente.");
        }catch(Exception $e){
            return redirect()->back()
            ->withInput()->with("error", "Fallo al crear la carrera.");
        }
    }

    public function show($id)
    {

        $race = Races::ReturnRace($id);

        $admin = $this->isAdmin();

        $segments = explode('T', $race->time_start);
        return view('show_races', compact('race', 'admin', 'segments'));
    }

    public function edit($id)
    {

        $admin = $this->isAdmin();

        if ($admin == true) {

            $race = Races::ReturnRace($id);
            return view('edit_race', compact('race'));
        } else {
            //abort(403);
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'distance'  => 'required|numeric',
            'time_start'  => 'required|date',
        ]);

        try{
            $race = Races::find($id);

            $race->name = $request->name;
            $race->descripcion = $request->descripcion;
            $race->distance  = $request->distance;
            $race->time_start  = $request->time_start;
            if (!empty($request->file)) {
                $race->image = $request->file('file')->store('public');
            }

            $race->save();
            return redirect()->route("carreras.show", $race)
            ->with("success", "Carrera actualizada correctamente.");
        }catch(Exception $e){
            return redirect()->route("carreras.show", $race)
            ->withInput()->with("error", "Fallo en la actualizacion de la carrera.");
        }
    }

    public function destroy($id)
    {
        try{
            $new = Races::ReturnRace($id);
            $new->delete();
            return redirect('/carreras')
            ->with("success", "Carrera eliminada correctamente.");
        }catch(Exception $e){
            return redirect()->back()
            ->with("error","No se ha podido eliminar");
        }
    }
}

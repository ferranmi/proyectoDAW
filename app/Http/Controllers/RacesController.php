<?php

namespace App\Http\Controllers;

use App\Models\Races;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RacesController extends Controller
{

    public function index(Request $request)
    {

        $races = Races::ReturnAll();
        $admin = false;


        if (session()->has('user')) {
            if (!empty(session('user'))) {
                if (session('user')->type_user == 'A') {
                    $admin = true;
                }
            }
        }


        return view('carreras', compact('races', 'admin'));
    }

    public function create()
    {
        return view('nova_carrera');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $race = new Races();

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'distance'  => 'required',
            'time_start'  => 'required',
            "file" => 'required',
        ]);
        // dd('aaaaaaaa');
        $codigo = Races::GetMaxId();
        $id = $codigo->id + 1;

        $race->code = $id;
        $race->name = $request->name;
        $race->descripcion = $request->descripcion;
        $race->distance  = $request->distance;
        $race->time_start  = $request->time_start;
        $race->image = $request->file('file')->store('public');
        // dd($race);
        $race->save();
        return redirect()->route("carreras.show", $race);
    }

    public function show($id)
    {

        $race = Races::ReturnRace($id);
        $admin = false;


        if (session()->has('user')) {
            if (!empty(session('user'))) {
                if (session('user')->type_user == 'A') {
                    $admin = true;
                }
            }
        }
        //dd($race->time_start);
        $segments = explode('T', $race->time_start);
        //dd($segments);

        return view('show_races', compact('race', 'admin', 'segments'));
    }

    public function edit($id)
    {
        $race = Races::ReturnRace($id);

        return view('edit_race', compact('race'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $race = Races::find($id);

        $race->name = $request->name;
        $race->descripcion = $request->descripcion;
        $race->distance  = $request->distance;
        $race->time_start  = $request->time_start;
        $race->image = $request->file('file')->store('public');
        //dd($race);
        $race->save();
        return redirect("/carreras");
    }

    public function destroy($id)
    {

        $new = Races::ReturnRace($id);
        $new->delete();
        return redirect('/carreras');
    }
}

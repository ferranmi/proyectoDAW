<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $client=[
            "name"=>$request->input("name"),
            "email"=>$request->input("email"),
            "asunto"=>$request->input("asunto"),
            "textarea"=>$request->input("textarea"),
        ];
        dd($client);
        return view('register');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function store(Request $request){
        $client=[
            "dni"=>$request->input("dni"),
            "name"=>$request->input("name"),
            "lastname"=>$request->input("lastname"),
            "email"=>$request->input("email"),
            "password"=>$request->input("passwd"),
            "datanac"=>$request->input("datanac"),
        ];
        foreach ($client as $cli){
            if($cli==''){
                return back()->withInput($client);
            }
        }
        //dd($client);
        return redirect('/');
    }

    public function access(Request $request){
        $client=[
            "email"=>$request->input("email"),
            "password"=>$request->input("passwd"),
        ];
        dd($client);
        return view('register');
    }
}

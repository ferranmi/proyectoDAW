<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->passwd;
        $user->birth_date = $request->datanac;
        $user->type_user = 'C';
        //dd($user);
        /*foreach ($user as $cli){
            if($cli==''){
                return back()->withInput();
            }
        }*/

        $user->save();
        //dd($client);
        return redirect('/');
    }

    public function access(Request $request)
    {
        $client = [
            "email" => $request->input("email"),
            "password" => $request->input("passwd"),
        ];
        dd($client);
        return view('register');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Route;

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
        /*
Validaciones que no sean null, nombre y apellido sin numeros dni formato correcto, passwd y passwd 2 el mismo y encriptado
*/
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        //$user->password=$request->passwd;
        $passHash = password_hash($request->passwd, PASSWORD_BCRYPT);
        $user->password = $passHash;
        $request->datanac = date('Y-m-d H:i:s');
        $user->birth_date = $request->datanac;

        $user->type_user = 'C';
        $user->save();
        return redirect('/login');
    }

    public function access(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("passwd");
        $user_login = User::LogIn($email);
        if ($user_login->email == $email) {
            if (password_verify($password, $user_login->password)) {
                // dd('passwd i email');
                return view('products');
            } else {
                return back()->withInput();
                // dd('no passwd pero si email');
            }
            return back()->withInput();
            // dd('no email');
        }
        return back()->withInput();
    }
}

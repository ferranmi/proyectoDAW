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
        //dd($request);
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $passwd1 = $request->passwd;
        $passwd2 = $request->passwd2;
        if (empty($passwd2)) {
            if (empty($passwd1)) {
                if ($passwd1 != $passwd2) {
                    return back()->withInput();
                }
            }
        }

        $passHash = password_hash($request->passwd, PASSWORD_BCRYPT);
        $user->password = $passHash;
        $request->datanac = date('Y-m-d H:i:s');
        $user->birth_date = $request->datanac;

        $user->type_user = 'A';
        $user->save();
        return redirect('/login');
    }

    public function access(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("passwd");
        if (!empty($email) && !empty($password)) {
            $user_login = User::LogIn($email);
            if (!empty($user_login->email)) {
                if ($user_login->email == $email) {
                    if (password_verify($password, $user_login->password)) {
                        $request->session()->put('user', $user_login);
                        return redirect('/',);
                    }
                }
            }
            return back()->withInput();
        }
    }
}

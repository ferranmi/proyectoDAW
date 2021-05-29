<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class userController extends Controller
{


    public function index(Request $request)
    {
        //dd($request->all());
        //dd(session('user')->id);
        $filter = new User;
        $users = User::query();

        if (!empty($request->dni_filter)) {
            $filter->dni = $request->dni_filter;
            $users = $users->where('dni', 'LIKE', '%' . $request->dni_filter . '%');
        }
        if (!empty($request->name_filter)) {
            $filter->name = $request->name_filter;
            $users = $users->where('name', 'LIKE', '%' . $request->name_filter . '%');
        }
        if (!empty($request->lastname_filter)) {
            $filter->lastname = $request->lastname_filter;
            $users = $users->where('lastname', 'LIKE', '%' . $request->lastname_filter . '%');
        }
        if (!empty($request->email_filter)) {
            $filter->email = $request->email_filter;
            $users = $users->where('email', 'LIKE', '%' . $request->email_filter . '%');
        }
        if (!empty($request->birth_date_filter)) {
            $filter->birth_date = $request->birth_date_filter;
            $users = $users->where('birth_date', '>=', $request->birth_date_filter);
        }
        if (!empty($request->type_user_filter)) {
            $filter->type_user = $request->type_user_filter;
            $users = $users->where('type_user', '=', $request->type_user_filter);
        }

        //dd($filter);


        if (session()->has('user')) {
            if (!empty(session('user'))) {
                if (session('user')->type_user == 'A') {
                    //$usuarios = User::ReturnAll();
                    $usuarios = $users->select('id', 'dni', 'name', 'lastname', 'email', 'birth_date', 'type_user')->get();
                    // dd($usuarios);
                    return view('usuarios', compact('usuarios', 'filter'));
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        }
    }

    public function show(Request $request)
    {
        // dd($request);
        return view('show_user');
    }

    public function create(Request $request)
    {

        if (session()->has('user')) {
            if (!empty(session('user'))) {
                if (session('user')->type_user == 'A') {
                    return view('create_user');
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        //dd($id);
        if (session()->has('user')) {
            if (!empty(session('user'))) {
                $usuarios = User::find($id);
                //dd($usuarios->birth_date);
                $date = Str::substr($usuarios->birth_date, 0, 10);
                //dd($date);
                return view('edit_user', compact('usuarios', 'date'));
            } else {
                abort(403);
            }
        }
    }

    public function update(Request $request, $id)
    {
        // $user = new User();
        /*
Validaciones que no sean null, nombre y apellido sin numeros dni formato correcto, passwd y passwd 2 el mismo y encriptado
*/
        //dd($request);
        $user = User::find($id);
        //DD($user);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->type_user = $request->type;
        if (!empty($request->passwd)) {
            $passHash = password_hash($request->passwd, PASSWORD_BCRYPT);
            $user->password = $passHash;
        }
        if (empty($request->type)) {
            $user->type_user = 'C';
        } else {
            $user->type_user = $request->type;
        }
        //dd($user->type_user);
        $user->save();
        return redirect("/show_usuario/{{ session('user')->id }}");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        //dd($user);
        $user->delete();
        return redirect('/usuarios');
    }





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


        if (empty($request->type)) {
            $user->type_user = 'C';
        } else {
            $user->type_user = $request->type;
        }
        //dd($user);
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

                        return redirect('/');
                    } else {
                    }
                }
            }
            return back()->withInput();
        }
    }

    public function logout(Request $request)
    {

        $request->session()->put('user', '');

        return redirect('/');
    }
}

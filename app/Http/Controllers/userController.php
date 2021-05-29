<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class userController extends Controller
{

    public function index(Request $request)
    {

        $admin = $this->isAdmin();

        if ($admin == true) {


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


            $usuarios = $users->select('id', 'dni', 'name', 'lastname', 'email', 'birth_date', 'type_user')->get();

            return view('usuarios', compact('usuarios', 'filter'));
        } else {
            abort(403);
        }
    }

    public function show(Request $request)
    {
        return view('show_user');
    }

    public function create()
    {

        $admin = $this->isAdmin();

        if ($admin == true) {

            return view('create_user');
        } else {
            abort(403);
        }
    }

    public function edit(Request $request, $id)
    {

        if (session()->has('user')) {
            if (!empty(session('user'))) {
                $usuarios = User::find($id);

                $date = Str::substr($usuarios->birth_date, 0, 10);

                return view('edit_user', compact('usuarios', 'date'));
            } else {
                abort(403);
            }
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email:rfc,dns',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;

        if (!empty($request->passwd)) {
            $passHash = password_hash($request->passwd, PASSWORD_BCRYPT);
            $user->password = $passHash;
        }

        if (empty($request->type)) {
            $user->type_user = 'C';
        } else {
            $user->type_user = $request->type;
        }

        $user->save();

        return redirect("/show_usuario/{{ session('user')->id }}");
    }

    public function destroy($id)
    {
        $user = User::find($id);

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

        $request->validate([
            'dni' => 'required|alpha_num|max:9|',
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email:rfc,dns',
            'passwd' => 'required',
            'passwd2' => 'required',
            'datanac' => 'required',
        ]);

        $user = new User();

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

        $edad = Carbon::parse($request->datanac)->age;
        if ($edad >= 18) {
            $request->datanac = date('Y-m-d H:i:s');
            $user->birth_date = $request->datanac;
        } else {
            return back()->withInput();
        }



        if (empty($request->type)) {
            $user->type_user = 'C';
        } else {
            $user->type_user = $request->type;
        }

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

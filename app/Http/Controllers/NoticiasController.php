<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {
        $news = Noticias::ReturnAll();
        $admin = false;

        if (session()->has('user')) {
            if (session('user')->type_user == 'A') {
                $admin = true;
            }
        }


        return view("noticias", compact('news', 'admin'));
    }

    public function create()
    {
        return view('nova_noticia');
    }
    public function store(Request $request)
    {
        $new = new Noticias();

        $request->validate([
            'titulo_noticia' => 'required',
            'd_short' => 'required',
            'd_larga'  => 'required',
            "file" => 'required',
        ]);

        $codigo = Noticias::GetMaxId();
        $id = $codigo->id + 1;

        $new->code = $id;
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->d_larga;
        $new->commentaries  = $request->content;
        $new->image = $request->file('file')->store('public');

        $new->save();
        return redirect()->route("noticias.show", [$new]);
    }

    public function show($id)
    {
        $news = Noticias::ReturnNew($id);
        $admin = false;
        if (session()->has('user')) {
            if (session('user')->type_user == 'A') {
                $admin = true;
            }
        }
        return view("show_noticia", compact('news', 'admin'));
    }

    public function edit($id)
    {
        $news = Noticias::ReturnNew($id);

        return view('edit_noticia', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $new = Noticias::find($id);

        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->content;
        $new->commentaries  = $request->content;
        $new->image = $request->file('file')->store('public');

        $new->save();
        return redirect("/noticias");
    }
}

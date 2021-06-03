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
        $admin = $this->isAdmin();


        return view("noticias", compact('news', 'admin'));
    }

    public function create()
    {
        $admin = $this->isAdmin();

        if ($admin == true) {
            return view('nova_noticia');
        } else {
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
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
        if (!empty($codigo->id)) {
            $new->id = $codigo->id + 1;
        } else {
            $new->id = 1;
        }
        $new->code = $new->id;
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->d_larga;
        $new->image = $request->file('file')->store('public');

        $new->save();
        return redirect()->route("noticias.show", [$new]);
    }

    public function show($id)
    {

        $news = Noticias::ReturnNew($id);

        $admin = $this->isAdmin();

        return view("show_noticia", compact('news', 'admin'));
    }

    public function edit($id)
    {
        $admin = $this->isAdmin();
        $news = Noticias::ReturnNew($id);
        if ($admin == true) {
            return view('edit_noticia', compact('news'));
        } else {
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
    }

    public function update(Request $request, $id)
    {
        $new = Noticias::find($id);
        $request->validate([
            'titulo_noticia' => 'required',
            'd_short' => 'required',
            'content'  => 'required',
        ]);
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->content;
        if (!empty($request->file)) {
            $new->image = $request->file('file')->store('public');
        }
        $new->save();
        return redirect("/noticias");
    }

    public function destroy($id)
    {

        $new = Noticias::ReturnNew($id);
        $new->delete();
        return redirect('/noticias');
    }
}

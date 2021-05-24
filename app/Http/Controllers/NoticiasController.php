<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticiasController extends Controller
{

    public function index()
    {
        //$news = Noticias::paginate(10);
        $news = Noticias::ReturnAll();

        //$news = $news->take(4);
        return view('noticias', compact('news'));
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
            'content'  => 'required',
            "file" => 'required',
        ]);

        $codigo = Noticias::GetMaxId();
        $id = $codigo->id + 1;

        $new->code = $id;
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->content;
        $new->commentaries  = $request->content;
        $new->image = $request->file('file')->store('public');

        $new->save();
        return redirect("/noticias");
    }

    public function show($id)
    {
        $news = Noticias::where('code', $id)->first();
        //dd($news);
        return view('show_noticia', compact('news'));
    }

    public function edit($id)
    {
        $news = Noticias::where('code', $id)->first();

        //dd($news);
        return view('edit_noticia', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $new = new Noticias();

        /*$validated = $request->validated();
        //dd($request);
        $request->validate([
            'titulo_noticia' => 'required',
            'd_short' => 'required',
            'content'  => 'required',
            "file" => 'required',
        ]);*/
        //dd($request->validate());
        /* $codigo = Noticias::GetMaxId();
        $id = $codigo->id + 1;

        $new->code = $id;*/
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->content;
        $new->commentaries  = $request->content;
        $new->image = $request->file('file')->store('public');
        //dd($new);
        $new->save();
        return redirect("/noticias");
    }
}

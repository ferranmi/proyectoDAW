<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{

    public function index()
    {
        //$news = Noticias::paginate(10);
        $news = Noticias::ReturnAll();

        //$news = $news->take(4);
        return view('noticias', compact('news'));
    }

    public function show($id)
    {
        $news = Noticias::where('code', $id)->first();
        dd($news);
        return view('noticias', compact('news'));
    }
    public function create()
    {
        return view('nova_noticia');
    }
    public function store(Request $request)
    {
        $new = new Noticias();
        //dd($request);
        $new->code = $request->titulo_noticia;
        $new->title = $request->titulo_noticia;
        $new->d_short = $request->d_short;
        $new->content  = $request->content;
        $new->commentaries  = $request->content;
        $new->image  = $request->file;


        // dd($new);
        $new->save();
        return redirect("/noticias");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(){
        $news = Noticias::paginate(10);
        return view('noticias', compact('news'));
    }

    public function show($id){

        $news = Noticias::where('code',$id)->first();
        dd($news);
        return view('noticias', compact('news'));
    }

}

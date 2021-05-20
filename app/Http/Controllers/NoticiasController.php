<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(){
       // $news = Noticias::paginate(10);
        $news = Noticias::ReturnAll();
        return view('noticias', compact('news'));
    }

    public function show($id){

        $news = Noticias::ReturnNew($id);
        //dd($news);
        return view('noticias', compact('news'));
    }

}

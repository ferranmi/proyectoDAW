<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class RacesController extends Controller
{
    //
    public function index()
    {
        //$news = Noticias::paginate(10);
        $news = Noticias::ReturnAll();

        //$news = $news->take(4);
        return view('carreras', compact('news'));
    }
}

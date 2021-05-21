<?php

namespace App\Http\Controllers;

use App\Models\Races;
use Illuminate\Http\Request;

class RacesController extends Controller
{
    //
    public function index()
    {
        //$news = Noticias::paginate(10);
        $news = Races::ReturnAll();

        //$news = $news->take(4);
        return view('carreras', compact('news'));
    }
}

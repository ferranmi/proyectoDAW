<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use App\Models\Races;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $news = Noticias::ReturnAll();
        $news = $news->take(4);
        $races = Races::ReturnAll();
        return view('products', compact('news', 'races'));
    }
}

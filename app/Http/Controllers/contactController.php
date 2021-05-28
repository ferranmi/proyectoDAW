<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index(Request $request)
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $contact = new Contacts();
        $id = Contacts::GetMaxId();
        $contact->code = $id->id + 1;
        $contact->name = $request->input("name");
        $contact->email = $request->input("email");
        $contact->subject = $request->input("asunto");
        $contact->comment = $request->input("textarea");

        $contact->save();
        return view('contacto');
    }
}

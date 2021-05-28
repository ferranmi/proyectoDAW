<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productos = Products::ReturnAll();
        $admin=false;

        if (session()->has('user')){
            if (!empty(session('user'))){
                if(session('user')->type_user=='A'){
                    $admin=true;
                }
            }
        }

        return view("productos", compact('productos','admin'));
    }

    public function show($id)
    {
        $productos = Products::ReturnProduct($id);
        $admin=false;
        if (session()->has('user')){
            if (!empty(session('user'))){
                if(session('user')->type_user=='A'){
                    $admin=true;
                }
            }
        }
        return view("show_producto", compact('productos','admin'));
    }

    public function edit($id)
    {
        $productos = Products::ReturnProduct($id);

        return view('edit_producto', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $product = Products::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock  = $request->stock;
        $product->descripcio  = $request->descripcio;
        $product->image = $request->file('file')->store('public');
        //dd($product);
        $product->save();
        return redirect("/productos");
    }

    public function destroy ($id){

        $new = Products::ReturnProduct($id);
        $new->delete();
        return redirect('/productos');

    }
}

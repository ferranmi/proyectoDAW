<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productos = Products::ReturnAll();
        $admin = $this->isAdmin();

        return view("productos", compact('productos', 'admin'));
    }

    public function show($id)
    {
        $productos = Products::ReturnProduct($id);
        $admin = $this->isAdmin();

        return view("show_producto", compact('productos', 'admin'));
    }

    public function create()
    {

        $admin = $this->isAdmin();

        if ($admin == true) {

            return view('nuevo_producto');
        } else {
            //abort(403);
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
    }

    public function store(Request $request)
    {
        $product = new Products();

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock'  => 'required|numeric',
            'descripcio'  => 'required',
            "file" => 'required',
        ]);

        $codigo = Products::GetMaxId();
        if (!empty($codigo->id)) {
            $product->id = $codigo->id + 1;
        } else {
            $product->id = 1;
        }




        $product->code = $product->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock  = $request->stock;
        $product->descripcio  = $request->descripcio;
        $product->image = $request->file('file')->store('public');

        $product->save();
        return redirect()->route("productos.show", [$product]);
    }

    public function edit($id)
    {
        $admin = $this->isAdmin();

        if ($admin == true) {

            $productos = Products::ReturnProduct($id);

            return view('edit_producto', compact('productos'));
        } else {
            //abort(403);
            return redirect()->back()
                ->with('error', 'No tiene permiso para acceder a esta pagina.');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock'  => 'required|numeric',
            'descripcio'  => 'required',
            "file" => 'required',
        ]);

        $product = Products::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock  = $request->stock;
        $product->descripcio  = $request->descripcio;
        $product->image = $request->file('file')->store('public');

        $product->save();
        return redirect("/productos");
    }

    public function destroy($id)
    {

        $new = Products::ReturnProduct($id);
        $new->delete();
        return redirect('/productos');
    }
}

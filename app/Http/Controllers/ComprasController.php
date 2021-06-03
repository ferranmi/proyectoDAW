<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Products;
use Illuminate\Http\Request;

class ComprasController extends Controller
{

    public function index(Request $request)
    {

        if (session()->has('user')) {
            if (!empty(session('user'))) {
                //$result = inscripciones::JoinUserToInscr();
                if(session('user')->type_user=='A'){

                $carrito = Compras::join('users', 'compras.dni', '=', 'users.dni')
                    ->join('products', 'compras.code', '=', 'products.code')
                    ->get(['users.*', 'compras.*', 'products.*']);
                }else{

                    $carrito = Compras::join('users', 'compras.dni', '=', 'users.dni')
                    ->join('products', 'compras.code', '=', 'products.code')
                    ->where('users.dni', session('user')->dni)
                    ->get(['users.*', 'compras.*', 'products.*']);
                }
                //dd($carrito);
                return view('carrito', compact('carrito'));
            }
        }
    }


    public function create(Request $request, $id)
    {

        $isLogged = false;

        if (session()->has('user')) {
            if (!empty(session('user'))) {

                $product = Products::find($id);
                //dd($product);
                return view('compras', compact('product'));
            }
        }


        return redirect()->route('login')
            ->with('error', 'You are not allowed to access this page.');

    }

    public function store(Request $request, $id)
    {

        $compra = new Compras();
        $product = Products::GetMaxId($id);
        $request->validate([
            'cantidad' => 'required|numeric|min:0|not_in:0',
        ]);
        $product->stock = $product->stock - $request->cantidad;
        if($product->stock<0){
            //dd($product->stock);
            return redirect()->back()
            ->with('error', 'No puedes comprar mas productos que los disponibles.');;
        }

        $compra->dni = session('user')->dni;
        $compra->code = $id;
        $compra->quantity = $request->cantidad;
        $compra->price = $product->price;
        $compra->save();

        //$product->stock = $product->stock - $request->cantidad;

        $product->save();
        return redirect()->route("productos.show", $id);

    }
}

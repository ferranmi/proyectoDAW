<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

   /*  public function scopeJoinCompraToUser()
    {
        return "join('users', 'compras.dni', '=', 'users.dni')";
    }

    public function scopeJoinCompraToProducts(){
        return "join('products', 'compras.code', '=', 'products.code')";
    } */
}

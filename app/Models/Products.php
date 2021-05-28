<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function scopeReturnAll($query)
    {
        return $query->paginate(12);
    }

    public function scopeReturnProduct($query, $id)
    {
        return $query->where('code', $id)->first();
    }
}

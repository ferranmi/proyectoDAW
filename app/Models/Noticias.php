<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;
    public function scopeReturnAll($query)
    {
        return $query->paginate(10);
    }


    public function scopeReturnNew($query, $id)
    {
        return $query->where('code', $id)->first();
    }

    public function scopeGetMaxId($query)
    {
        return $query->OrderByDesc('id')->first();
    }
}

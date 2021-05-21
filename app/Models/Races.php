<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
    use HasFactory;
    public function scopeReturnAll($query)
    {
        return $query->limit(2)->get();
    }
}

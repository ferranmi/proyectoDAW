<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class inscripciones extends Model
{
    use HasFactory;

    public function scopeGetMaxDorsal($query)
    {
        return $query->OrderByDesc('dorsal')->first();
    }
}

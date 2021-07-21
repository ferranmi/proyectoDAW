<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class inscripciones extends Model
{
    use HasFactory;

    public function scopeGetMaxDorsal($query, $carrera)
    {
        return $query->where('carrera', $carrera)
        ->OrderByDesc('dorsal')
        ->first();
    }

    public function scopeGetInscripcio($query, $dni, $carrera)
    {
        return $query->where('dni', $dni)
        ->where('carrera', $carrera)
        ->get();
    }

    public function scopeGetDorsal($query, $dorsal, $carrera)
    {
        return $query->where('dorsal', $dorsal)
        ->where('carrera', $carrera)
        ->first();
    }

    public function scopeReturnInscripcion($query, $carrera, $dorsal)
    {
        return $query->where('carrera', $carrera)
        ->where('dorsal', $dorsal)
        ->first();
    }

}

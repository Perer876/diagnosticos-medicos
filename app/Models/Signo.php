<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signo extends Model
{
    use HasFactory;

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class);
    }

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class);
    }
}

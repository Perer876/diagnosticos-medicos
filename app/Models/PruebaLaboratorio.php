<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaLaboratorio extends Model
{
    use HasFactory;

    public function enfermedades()
    {
        return $this->hasMany(Cita::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function identificacion()
    {
        return $this->belongsTo(Identificacion::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}

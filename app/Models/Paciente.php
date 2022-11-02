<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property string $sexo
 * @property $fecha_nacimiento
 * @property string $antecedentes_familiares
 * @property Identificacion $identificacion
 * @property Direccion $direccion
 * @property Collection $citas
 */
class Paciente extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function identificacion()
    {
        return $this->belongsTo(Identificacion::class);
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}

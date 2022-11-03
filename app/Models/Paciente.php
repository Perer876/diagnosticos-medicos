<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Sexos;

/**
 * @mixin Builder
 * @property int $id
 * @property Sexos $sexo
 * @property $fecha_nacimiento
 * @property string $antecedentes_familiares
 * @property int $identificacion_id
 * @property Identificacion $identificacion
 * @property int $direccion_id
 * @property Direccion $direccion
 * @property Collection $citas
 */
class Paciente extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sexo' => Sexos::class,
    ];

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

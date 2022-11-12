<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property $fecha
 * @property $hora
 * @property int $medico_id
 * @property Medico $medico
 * @property int $paciente_id
 * @property Paciente $paciente
 * @property Collection $evaluaciones
 * @property int $estado_cita_id
 * @property EstadoCita $estado
 */
class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoCita::class, 'estado_cita_id');
    }
}

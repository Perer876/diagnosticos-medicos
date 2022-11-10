<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * @mixin Builder
 * @property int $id
 * @property int $cita_id
 * @property Cita $cita
 * @property int $enfemedad_id
 * @property Enfermedad $enfermedad
 * @property Collection $signos
 * @property Collection $sintomas
 */
class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $guarded = [];

    public $timestamps = false;

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function signos()
    {
        return $this->belongsToMany(Signo::class);
    }

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class);
    }
    
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class);
    }
}

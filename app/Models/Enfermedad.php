<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\InferenceEngines\Enfermedades\Relations\Enfermedad as RuleEnfermedad;
use App\InferenceEngines\Enfermedades\Relations\Signo as FactSigno;
use App\InferenceEngines\Enfermedades\Relations\Sintoma as FactSintoma;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Collection $signos
 * @property Collection $sintomas
 * @property Collection $pruebas_laboratorio
 * @property Collection $pruebas_post_mortem
 * @property Collection $tratamientos
 * @property Collection $enfermedades
 */
class Enfermedad extends Model
{
    use HasFactory;

    protected $table = 'enfermedades';

    protected $guarded = [];

    public function signos()
    {
        return $this->belongsToMany(Signo::class);
    }

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class);
    }

    public function pruebasLaboratorio()
    {
        return $this->belongsToMany(PruebaLaboratorio::class);
    }

    public function pruebasPostMortem()
    {
        return $this->belongsToMany(PruebaPostMortem::class);
    }

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function rule(): Attribute
    {
        return Attribute::make(
            get: function () {
                $signosYSintomas = [];

                foreach ($this->signos as $signo) {
                    $signosYSintomas[] = $signo->fact;
                }

                foreach ($this->sintomas as $sintoma) {
                    $signosYSintomas[] = $sintoma->fact;
                }

                return RuleEnfermedad::is($this->nombre)->if(
                    ...$signosYSintomas
                );
            },
        );
    }
}

<?php

namespace App\Models;

use App\InferenceEngines\Enfermedades\Relations\Enfermedad as RuleEnfermedad;
use App\InferenceEngines\Enfermedades\Relations\Signo as FactSigno;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\InferenceEngines\Enfermedades\Relations\Sintoma as FactSintoma;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Collection $evaluaciones
 * @property Collection $enfermedades
 */
class Sintoma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public $timestamps = false;

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class);
    }

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class);
    }

    public function fact(): Attribute
    {
        return Attribute::make(
            get: fn () => FactSintoma::is($this->nombre)
        );
    }
}

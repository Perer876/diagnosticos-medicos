<?php

namespace App\Models;

use App\InferenceEngines\Enfermedades\Relations\Signo as FactSigno;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Collection $evaluaciones
 * @property Collection $enfermedades
 */
class Signo extends Model
{
    use HasFactory;

    protected $guarded = [];

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
            get: fn () => FactSigno::is($this->nombre)
        );
    }
}

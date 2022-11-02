<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property string $nombre
 * @property string $descripcion
 * @property Collection $signos
 * @property Collection $sintomas
 * @property Collection $pruebas_laboratorio
 * @property Collection $pruebas_post_mortem
 * @property Collection $tratamientos
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
}

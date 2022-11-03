<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Collection $enfermedades
 */
class PruebaLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'pruebas_laboratorio';

    protected $guarded = [];

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class);
    }
}

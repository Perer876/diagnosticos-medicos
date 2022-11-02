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
 * @property string $modo_uso
 * @property Collection $enfermedades
 */
class Tratamiento extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class);
    }
}

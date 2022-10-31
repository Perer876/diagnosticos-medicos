<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class PruebaLaboratorio extends Model
{
    use HasFactory;

    protected $table = 'pruebas_laboratorio';

    protected $guarded = [];

    public function enfermedades()
    {
        return $this->hasMany(Enfermedad::class);
    }
}

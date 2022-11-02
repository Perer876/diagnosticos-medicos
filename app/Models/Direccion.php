<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property Estado $estado
 * @property Pais $pais
 */
class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $guarded = [];

    protected function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    protected function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    protected function user()
    {
        return $this->hasOne(User::class);
    }

    protected function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}

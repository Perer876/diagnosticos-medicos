<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property int $estado_id
 * @property Estado $estado
 * @property int $pais_id
 * @property Pais $pais
 * @property User $user
 * @property Paciente $paciente
 */
class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $guarded = [];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }

    public function completa(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->estado->nombre}, {$this->pais->nombre}",
        );
    }
}

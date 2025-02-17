<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombre
 * @property User $user
 * @property Paciente $paciente
 */
class Identificacion extends Model
{
    use HasFactory;

    protected $table = 'identificaciones';

    protected $guarded = [];

    public $timestamps = false;

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) =>
                $attributes['nombres'] . ' ' . $attributes['apellido_paterno'] . ' ' . $attributes['apellido_materno']
        );
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}

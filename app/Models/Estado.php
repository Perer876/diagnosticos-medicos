<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property string $nombre
 * @property Pais $pais
 * @property Collection $users
 * @property Collection $pacientes
 */
class Estado extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}

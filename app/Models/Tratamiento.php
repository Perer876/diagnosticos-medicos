<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Tratamiento extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function enfermedades()
    {
        return $this->hasMany(Cita::class);
    }
}

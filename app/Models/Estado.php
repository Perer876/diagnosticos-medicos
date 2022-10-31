<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
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

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}

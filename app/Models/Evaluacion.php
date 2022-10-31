<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $guarded = [];

    public $timestamps = false;

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function signos()
    {
        return $this->belongsToMany(Signo::class);
    }

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class);
    }
}

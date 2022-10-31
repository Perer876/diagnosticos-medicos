<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class EstadoCita extends Model
{
    use HasFactory;

    protected $table = 'estados_cita';

    protected $guarded = [];

    public $timestamps = false;

    protected function citas()
    {
        return $this->hasMany(Cita::class, 'estado_cita_id');
    }
}

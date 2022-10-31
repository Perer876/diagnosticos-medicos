<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    protected $guarded = [];

    public $timestamps = false;

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}

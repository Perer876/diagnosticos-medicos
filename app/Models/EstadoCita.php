<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * @property int $id
 * @property string $nombre
 * @property string $color
 * @property Collection $citas
 */
class EstadoCita extends Model
{
    use HasFactory;

    protected $table = 'estados_cita';

    protected $guarded = [];

    public $timestamps = false;

    public function citas()
    {
        return $this->hasMany(Cita::class, 'estado_cita_id');
    }
}

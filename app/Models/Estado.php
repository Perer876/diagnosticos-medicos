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
 * @property int $pais_id
 * @property Pais $pais
 * @property Direccion $direccion
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

    public function direccion()
    {
        return $this->hasMany(Direccion::class);
    }
}

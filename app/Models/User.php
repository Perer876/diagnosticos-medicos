<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Jetstream\HasProfilePhoto;

/**
 * @mixin Builder
 * @property string $alias
 * @property int $identificacion_id
 * @property Identificacion $identificacion
 * @property int $rol_id
 * @property Rol $rol
 * @property int $direccion_id
 * @property Direccion $direccion
 * @property Medico $medico
 */
class User extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function identificacion()
    {
        return $this->belongsTo(Identificacion::class);
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

    public function medico()
    {
        return $this->hasOne(Medico::class)->withDefault();
    }

    public function tieneRol($nombre): bool
    {
        return Str::lower($this->rol->nombre) === Str::lower($nombre);
    }

    /**
     * Filtra los usuarios según el nombre del rol que se le pase.
     * @param Builder $query
     * @param string $rol
     * @return void
     */
    public function scopeWhereRolIs(Builder $query, string $rol)
    {
        $query->whereHas('rol', function (Builder $query) use ($rol) {
            $query->where('nombre', '=', $rol);
        });
    }
}

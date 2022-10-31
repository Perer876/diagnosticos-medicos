<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

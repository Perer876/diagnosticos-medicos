<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Identificacion;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identificacion = Identificacion::create([
            'nombres' => 'Oscar Eduardo',
            'apellido_paterno' => 'Arámbula',
            'apellido_materno' => 'Vega'
        ]);

        User::create([
            'alias' => 'Admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'identificacion_id' => $identificacion->id,
            'rol_id' => Rol::first()->id,
        ]);

        User::factory()->count(20)->create();
    }
}

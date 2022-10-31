<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre' => 'Administrador',
            'color' => 'primary'
        ]);
        Rol::create([
            'nombre' => 'Secretario',
            'color' => 'warning'
        ]);
        Rol::create([
            'nombre' => 'Medico',
            'color' => 'danger'
        ]);
    }
}

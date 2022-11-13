<?php

namespace Database\Seeders;

use App\Models\EstadoCita;
use Illuminate\Database\Seeder;

class EstadoCitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCita::create([
           'nombre' => 'Pendiente',
           'color' => 'secondary',
        ]);

        EstadoCita::create([
           'nombre' => 'Cancelada',
           'color' => 'danger',
        ]);

        EstadoCita::create([
           'nombre' => 'Ausente',
           'color' => 'warning',
        ]);

        EstadoCita::create([
           'nombre' => 'Concluida',
           'color' => 'success',
        ]);
    }
}

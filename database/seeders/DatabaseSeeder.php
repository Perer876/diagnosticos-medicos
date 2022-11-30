<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use App\Models\PruebaLaboratorio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisesEstadosSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
            EspecialidadSeeder::class,
            PacienteSeeder::class,
            EstadoCitaSeeder::class,
            SintomaSeeder::class,
            SignoSeeder::class,
            TratamientoSeeder::class,
            PruebaLaboratorioSeeder::class,
        ]);
    }
}

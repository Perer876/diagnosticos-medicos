<?php

namespace Database\Seeders;

use App\Models\Enfermedad;
use App\Models\PruebaLaboratorio;
use App\Models\Signo;
use App\Models\Sintoma;
use App\Models\Tratamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enfermedad::factory()
            ->state([
                'nombre' => 'Bronquitis Aguda',
                'descripcion' => 'También llamada resfriado de pecho, ocurre cuando las vías respiratorias en el pulmón se inflaman y producen mucosidad en los pulmones. Eso es lo que lo hace toser. La bronquitis aguda puede durar menos de 3 semanas.'
            ])
            ->hasAttached(Sintoma::whereIn('nombre', [
                'Dolor en el pecho', 'Fatiga', 'Dolor de cabeza', 'Dolor corporal', 'Dolor de garganta'
            ])->get())
            ->hasAttached(Signo::whereIn('nombre', [
                'Tos', 'Dificultad para respirar',
            ])->get())
            ->hasAttached(Tratamiento::whereIn('nombre', [
                'Descansar', 'Tomar líquidos', 'Aspirina', 'Acetaminofén para bajar la fiebre'
            ])->get())
            ->hasAttached(PruebaLaboratorio::whereIn('nombre', [
                'Prueba de esputo', 'Gasometría arterial'
            ])->get(), relationship: 'pruebasLaboratorio')
            ->create();
    }
}

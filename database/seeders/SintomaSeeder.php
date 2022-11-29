<?php

namespace Database\Seeders;

use App\Models\Sintoma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sintoma::create(['nombre' => 'Dolor en el pecho',]);
        Sintoma::create(['nombre' => 'Fatiga',]);
        Sintoma::create(['nombre' => 'Dolor de cabeza',]);
        Sintoma::create(['nombre' => 'Dolor corporal',]);
        Sintoma::create(['nombre' => 'Dolor de garganta',]);
        Sintoma::create(['nombre' => 'Dolor de oído',]);
        Sintoma::create(['nombre' => 'Dificultad para dormir',]);
        Sintoma::create(['nombre' => 'Dolor encima de la vena',]);
        Sintoma::create(['nombre' => 'Escalofrios',]);
        Sintoma::create(['nombre' => 'Dolor al tragar',]);
        Sintoma::create(['nombre' => 'Dolor o ardor al orinar',]);
        Sintoma::create(['nombre' => 'Presión en la región inferior del abdomen',]);
        Sintoma::create(['nombre' => 'Orinar con frecuencia',]);
        Sintoma::create(['nombre' => 'Pérdida de apetito',]);
        Sintoma::create(['nombre' => 'Náuseas',]);
        Sintoma::create(['nombre' => 'Molestia abdominal',]);
        Sintoma::create(['nombre' => 'Dolor muscular',]);
        Sintoma::create(['nombre' => 'Debilidad muscular',]);
        Sintoma::create(['nombre' => 'Dolor en articulaciones',]);
        Sintoma::create(['nombre' => 'Dolor en el talón',]);
        Sintoma::create(['nombre' => 'Pérdida de apetito',]);
        Sintoma::create(['nombre' => 'Pérdida de apetito',]);
        Sintoma::create(['nombre' => 'Pérdida de apetito',]);
        Sintoma::create(['nombre' => 'Pérdida de apetito',]);
        Sintoma::create(['nombre' => 'Picazón ojos',]);        
    }
}

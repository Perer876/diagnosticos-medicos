<?php

namespace Database\Seeders;

use App\Models\Signo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Signo::create(['nombre' => 'Tos',]);
        Signo::create(['nombre' => 'Dificultad para respirar',]);
        Signo::create(['nombre' => 'Estornudos',]);
        Signo::create(['nombre' => 'Congestión',]);
        Signo::create(['nombre' => 'Secreción nasal',]);
        Signo::create(['nombre' => 'Secreción en el oído',]);
        Signo::create(['nombre' => 'Fiebre',]);
        Signo::create(['nombre' => 'Enrojecimiento de la piel',]);
        Signo::create(['nombre' => 'Inflamación',]);
        Signo::create(['nombre' => 'Inflamación de los nódulos',]);
        Signo::create(['nombre' => 'Erupción en la piel',]);
        Signo::create(['nombre' => 'Ganglios linfáticos inflamados',]);
        Signo::create(['nombre' => 'Hinchazón en la cara',]);
        Signo::create(['nombre' => 'Sangre en el esputo',]);
        Signo::create(['nombre' => 'Vómito',]);
        Signo::create(['nombre' => 'Diarrea',]);
        Signo::create(['nombre' => 'Transpiración nocturna',]);
        Signo::create(['nombre' => 'Tos con sangre',]);
        Signo::create(['nombre' => 'Tos con esputo',]);
        Signo::create(['nombre' => 'Falta de aliento',]);
        Signo::create(['nombre' => 'Respiración rápida',]);
        Signo::create(['nombre' => 'Frecuencia cardiaca alta',]);
        Signo::create(['nombre' => 'Presión arterial',]);
        Signo::create(['nombre' => 'Úlceras no cicatrizan',]);
        Signo::create(['nombre' => 'Perdida de peso',]);
        Signo::create(['nombre' => 'Hinchazón en articulaciones',]);
        Signo::create(['nombre' => 'Enrojecimiento en articulaciones',]);
        Signo::create(['nombre' => 'Llagas en la piel',]);
        Signo::create(['nombre' => 'Úlceras en la boca',]);
        Signo::create(['nombre' => 'Sangrado en la naríz',]);
        Signo::create(['nombre' => 'Sangrado en las encías',]);
        Signo::create(['nombre' => 'Sarpullido',]);
        Signo::create(['nombre' => 'Depresión',]);
        Signo::create(['nombre' => 'Ansiedad',]);
        Signo::create(['nombre' => 'Síndrome del intestino irritable',]);
        Signo::create(['nombre' => 'Orina oscura',]);
        Signo::create(['nombre' => 'Heces de color arcilla',]);
        Signo::create(['nombre' => 'Ictericia',]);
        Signo::create(['nombre' => 'Quemosis',]);
        Signo::create(['nombre' => 'Secreciones ojos',]);
        Signo::create(['nombre' => 'Lagrimeo',]);
    }
}

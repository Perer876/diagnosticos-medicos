<?php

namespace App\InferenceEngines\Enfermedades\KnowlegdeSources;

use App\InferenceEngines\Enfermedades\Relations\Enfermedad;
use App\InferenceEngines\Enfermedades\Relations\Signo;
use App\InferenceEngines\Enfermedades\Relations\Sintoma;
use App\Utilities\Logic\Contraptions\KnowlegdeSource;

class EnfermedadesSource extends KnowlegdeSource
{
    public static function get(): array
    {
        return [
            Signo::is('Latidos cardiacos rapidos'),
            Sintoma::is('Insomnio'),

            Enfermedad::is('Leucemia')->if(
                Signo::is('Sensación de cansancio'),
                Sintoma::is('Fiebre'),
            ),

            Enfermedad::is('Anemia')->if(
                Signo::is('Latidos cardiacos rapidos'),
                Sintoma::is('Insomnio'),
            ),
        ];
    }
}

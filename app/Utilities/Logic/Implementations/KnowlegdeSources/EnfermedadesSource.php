<?php

namespace App\Utilities\Logic\Implementations\KnowlegdeSources;

use App\Utilities\Logic\Contraptions\KnowlegdeSource;
use App\Utilities\Logic\Implementations\Relations\Enfermedad;
use App\Utilities\Logic\Implementations\Relations\Signo;
use App\Utilities\Logic\Implementations\Relations\Sintoma;

class EnfermedadesSource extends KnowlegdeSource
{
    public static function get(): array
    {
        return [
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

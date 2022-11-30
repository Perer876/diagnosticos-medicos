<?php

namespace App\InferenceEngines\Enfermedades\KnowlegdeSources;

use App\Models\Enfermedad;
use App\Utilities\Logic\Contraptions\KnowlegdeSource;

class EnfermedadesSource extends KnowlegdeSource
{
    public static function get(): array
    {
        $rules = [];

        foreach (Enfermedad::all() as $enfermedad) {
            $rules[] = $enfermedad->rule;
        }

        return $rules;
    }
}

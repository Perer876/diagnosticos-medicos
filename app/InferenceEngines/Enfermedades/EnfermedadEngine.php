<?php

namespace App\InferenceEngines\Enfermedades;

use App\InferenceEngines\Enfermedades\KnowlegdeSources\EnfermedadesSource;
use App\Utilities\Logic\Contraptions\InferenceEngine;

class EnfermedadEngine extends InferenceEngine
{
    protected array $knowledgeSources = [
        EnfermedadesSource::class
    ];
}

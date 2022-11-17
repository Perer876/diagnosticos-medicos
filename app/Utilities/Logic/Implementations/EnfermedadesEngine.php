<?php

namespace App\Utilities\Logic\Implementations;

use App\Utilities\Logic\Contraptions\InferenceEngine;
use App\Utilities\Logic\Implementations\KnowlegdeSources\EnfermedadesSource;

class EnfermedadesEngine extends InferenceEngine
{
    protected array $knowledgeSources = [
        EnfermedadesSource::class
    ];
}

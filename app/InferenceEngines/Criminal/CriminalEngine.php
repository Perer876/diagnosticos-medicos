<?php

namespace App\InferenceEngines\Criminal;

use App\Utilities\Logic\Contraptions\InferenceEngine;

class CriminalEngine extends InferenceEngine
{
    protected array $knowledgeSources = [
        CriminalSource::class
    ];
}

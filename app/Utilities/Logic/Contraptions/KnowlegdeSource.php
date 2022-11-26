<?php

namespace App\Utilities\Logic\Contraptions;

abstract class KnowlegdeSource
{
    /**
     * @return array<Fact|Rule>
     */
    public static function get(): array
    {
        return [];
    }
}

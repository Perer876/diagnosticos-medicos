<?php

namespace App\Utilities\Logic\Contraptions;

abstract class KnowlegdeSource
{
    /**
     * @return Fact[]
     */
    public static function facts(): array
    {
        return [];
    }

    /**
     * @return Rule[]
     */
    public static function rules(): array
    {
        return [];
    }
}

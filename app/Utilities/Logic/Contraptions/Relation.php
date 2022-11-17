<?php

namespace App\Utilities\Logic\Contraptions;

abstract class Relation
{
    public static function is(...$values): Rule
    {
        $relation = basename(static::class);
        return new Rule($relation, ...$values);
    }
}

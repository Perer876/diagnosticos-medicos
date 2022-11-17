<?php

namespace App\Utilities\Logic\Contraptions;

class Fact
{
    /**
     * @var string El nombre del hecho.
     */
    public string $relation;

    /**
     * @var array Los argumentos del hecho
     */
    public array $value;

    public function __construct(string $relation, mixed ...$values)
    {
        $this->relation = $relation;
        $this->value = $values;
    }
}

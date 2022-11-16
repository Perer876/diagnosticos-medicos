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

    public function __construct(...$values)
    {
        $this->relation = get_class($this);
        $this->value = $values;
    }

    public static function is(...$values): static
    {
        return new static(...$values);
    }
}

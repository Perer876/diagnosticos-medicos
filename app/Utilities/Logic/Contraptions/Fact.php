<?php

namespace App\Utilities\Logic\Contraptions;

use App\Utilities\Logic\Unification;

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

    /**
     * Aplica una substitucion al hecho
     * @param array $S
     * @return $this
     */
    public function apply(array $S): static
    {
        $newFact = new static($this->relation);

        foreach ($this->value as $value) {
            $sub = Unification::replacement($S, $value);
            if ($sub === null) {
                $newFact->value[] = $value;
            } else {
                $newFact->value[] = $sub;
            }
        }

        return $newFact;
    }
}

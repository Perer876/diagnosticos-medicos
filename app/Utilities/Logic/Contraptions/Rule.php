<?php

namespace App\Utilities\Logic\Contraptions;

use App\Utilities\Logic\Managers\FactManager;

class Rule
{
    /**
     * @var Fact La conclusion de la regla.
     */
    public Fact $conclusion;

    /**
     * @var FactManager Lista de premisas que se tienen que cumplir para que
     * la conclusion sea verdadera.
     */
    public FactManager $premises;

    /**
     * @param mixed ...$values
     */
    public function __construct(...$values)
    {
        $this->conclusion = new Fact(...$values);
        $this->conclusion->relation = get_class($this);
        $this->premises = new FactManager();
    }

    /**
     * Declará los valores de la conclusion.
     * @param ...$values
     * @return static
     */
    public static function is(...$values): static
    {
        return new static(...$values);
    }

    /**
     * Declara las premisas que tiene que cumplise para que se cumpla la conclusion.
     * @param ...$premises
     * @return $this
     */
    public function if(...$premises): static
    {
        $this->premises->add(...$premises);
        return $this;
    }
}

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
    public function __construct(string $relation, ...$values)
    {
        $this->conclusion = new Fact($relation, ...$values);
        $this->premises = new FactManager();
    }

    /**
     * Declara las premisas que tiene que cumplise para que se cumpla la conclusion.
     * @param Fact|Rule ...$premises
     * @return $this
     */
    public function if(Fact|Rule ...$premises): static
    {
        foreach ($premises as $premise) {
            if ($premise instanceof Fact) {
                $this->premises->add($premise);
            } else {
                $this->premises->add($premise->conclusion);
            }
        }
        return $this;
    }

    /**
     * Si no se tienen premisas entonces la regla se puede tratar como un hecho.
     * @return bool
     */
    public function isAFact(): bool
    {
        return empty($this->premises->get());
    }
}

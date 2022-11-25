<?php

namespace App\Utilities\Logic\Contraptions;

use App\Utilities\Logic\Managers\FactManager;
use App\Utilities\Logic\Managers\RuleManager;
use App\Utilities\Logic\Unification;

class InferenceEngine
{
    /**
     * @var FactManager Administra los hechos.
     */
    public FactManager $facts;

    /**
     * @var RuleManager Administra las reglas.
     */
    public RuleManager $rules;

    /**
     * @var array|string[]|KnowlegdeSource[]
     */
    protected array $knowledgeSources = [];

    public function __construct()
    {
        $this->loadKnowledgeSource();
    }

    /**
     * Restablece la base de conocimientos con la información inicial.
     * @return void
     */
    protected function loadKnowledgeSource(): void
    {
        $this->facts = new FactManager();
        $this->rules = new RuleManager();

        foreach ($this->knowledgeSources as $knowledgeSource)
        {
            $this->assert(...$knowledgeSource::get());
        }
    }

    /**
     * Agrega una cláusula a la base de conocimiento.
     * @param Fact|Rule $clause
     * @return void
     */
    protected function assertOne(Fact|Rule $clause): void
    {
        // Si es un hecho, se agrega a la base de hechos.
        if ($clause instanceof Fact) {
            $this->facts->add($clause);
            return;
        }

        // Si es una regla sin premisas, se agrega a la base de hechos.
        if ($clause->isAFact()) {
            $this->facts->add($clause->conclusion);
            return;
        }

        // Si es una regla con premisas, se agrega a la base de reglas.
        $this->rules->add($clause);
    }

    /**
     * Agrega cláusulas a la base de conocimiento.
     * @param Fact|Rule ...$clauses
     * @return void
     */
    public function assert(Fact|Rule ...$clauses): void
    {
        foreach ($clauses as $clause) {
            $this->assertOne($clause);
        }
    }

    /**
     * Quita de la base de conocimiento una cláusula
     * @param Fact|Rule|string $clause
     * @return void
     */
    protected function retractOne(Fact|Rule|string $clause): void
    {
        if (is_string($clause)) {
            $this->facts->remove($clause);
            $this->rules->remove($clause);
            return;
        }

        if ($clause instanceof Fact) {
            $this->facts->remove($clause);
            return;
        }

        if ($clause->isAFact()) {
            $this->facts->remove($clause->conclusion);
            return;
        }

        $this->rules->remove($clause);
    }

    /**
     * Quita de la base de conocimiento varias cláusulas. Si se deja vacio, se borra
     * toda la base de conocimiento.
     * @param Fact|Rule|string ...$clauses
     * @return void
     */
    public function retract(Fact|Rule|string ...$clauses): void
    {
        if (empty($clauses)) {
            $this->facts->remove();
            $this->rules->remove();
            return;
        }

        foreach ($clauses as $clause) {
            $this->retractOne($clause);
        }
    }

    public function infer(Fact $clause): array
    {
        $results = [];

        foreach ($this->facts->get($clause->relation) as $factValues) {
            $fact = new Fact($clause->relation, ...$factValues);

            $S = Unification::unify($clause, $fact);

            if ($S !== false) {
                $results[] = $S;
            }
        }

        foreach($this->rules->get($clause->relation) as [$value, $premises]) {
            $rule = new Rule($clause->relation, ...$value);
            $rule->if(...$premises);

            $results = [
                ...$results,
                ...$this->inferences($clause, $rule)
            ];
        }

        return $results;
    }

    protected function inferences(Fact $goal, Rule $rule): array
    {
        $S = Unification::unify($goal, $rule->conclusion);

        if ($S === false) {
            return [];
        }

        $combinations = [$S];
        foreach ($rule->premises as $premise) {
            $c = [];
            foreach ($combinations as $combination) {
                $clause = $premise->apply($combination);
                $results = $this->infer($clause);


                if (empty($results)) {
                    return [];
                }

                foreach ($results as $result) {
                    $c[] = [
                        ...$combination,
                        ...$result
                    ];
                }
            }
            $combinations = $c;
        }

        return $combinations;
    }

    public function query(Fact|Rule $clause)
    {
        if ($clause instanceof Rule) {
            $clause = $clause->conclusion;
        }

        $results = $this->infer($clause);

        if (empty($results)) {
            return false;
        }

        // TODO Terminar de interpretar los resultados

        $userResults = [];

        foreach ($results as $result) {

        }

    }
}

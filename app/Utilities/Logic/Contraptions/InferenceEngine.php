<?php

namespace App\Utilities\Logic\Contraptions;

use App\Utilities\Logic\Managers\FactManager;
use App\Utilities\Logic\Managers\RuleManager;

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
        foreach ($this->knowledgeSources as $knowledgeSource)
        {
            $this->facts = new FactManager(...$knowledgeSource::facts());
            $this->rules = new RuleManager(...$knowledgeSource::rules());
        }
    }

    public function assert(Fact|Rule $clause)
    {

    }

    public function retract(Fact|Rule|string $clause = null)
    {

    }

    public function query(Fact|Rule|string $clause)
    {

    }
}

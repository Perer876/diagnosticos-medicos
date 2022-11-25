<?php

namespace App\Utilities\Logic\Contraptions;

use App\Utilities\Logic\Managers\FactManager;
use App\Utilities\Logic\Managers\RuleManager;

class Resolver
{
    public FactManager $facts;

    public RuleManager $rules;

    public function __construct(FactManager $facts, RuleManager $rules)
    {
        $this->facts = $facts;
        $this->rules = $rules;
    }

    public function get(Fact $goal)
    {





    }
}

<?php

namespace App\Utilities;

abstract class Fact
{
    public readonly string $relation;
    public readonly mixed $value;

    public function __construct(mixed $value)
    {
        $this->relation = get_class($this);
        $this->value = $value;
    }
}

class Hombre extends Fact {};
class Mortal extends Fact {};

class Rule
{
    public array $premise;
    public array $conclusion = [];

    public function __construct(mixed $premise)
    {
        if (!is_array($premise))
            $this->premise = array($premise);
        else
            $this->premise = $premise;
    }

    public static function if(mixed $premise): static
    {
        return new static($premise);
    }

    public function then(mixed $conclusion): static
    {
        if (!is_array($conclusion))
            $this->conclusion = array($conclusion);
        else
            $this->conclusion = $conclusion;
        return $this;
    }
}

$rule = Rule::if([
    new Hombre('Jesus')
])->then([
   new Mortal('Jesus')
]);

interface RulesMaker
{
    public static function get(): array;
}

class EnfermedadRules implements RulesMaker
{
    public static function get(): array
    {
        return [];
    }
}

class InferenceEngine
{
    public array $facts;

    public array $rules;

    public function query(string $relation)
    {

    }
}



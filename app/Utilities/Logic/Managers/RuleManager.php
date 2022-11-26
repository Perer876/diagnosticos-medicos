<?php

namespace App\Utilities\Logic\Managers;

use App\Utilities\Logic\Contraptions\Rule;

class RuleManager
{
    /**
     * @var array
     */
    protected array $rules = [];

    public function __construct(Rule ...$rules)
    {
        if (sizeof($rules) !== 0) {
            $this->add(...$rules);
        }
    }

    protected static function value(Rule $rule): array
    {
        return [$rule->conclusion->value, $rule->premises];
    }

    /**
     * Agrega una sola regla
     * @param Rule $rule
     * @return void
     */
    protected function addOne(Rule $rule): void
    {
        $value = $this->value($rule);

        if (!key_exists($rule->conclusion->relation, $this->rules) ||
            !in_array($value, $this->rules[$rule->conclusion->relation])
        ) {
            $this->rules[$rule->conclusion->relation][] = $value;
        }
    }

    /**
     * Agrega varias reglas.
     * @param Rule ...$rules
     * @return void
     */
    public function add(Rule ...$rules): void
    {
        foreach ($rules as $rule) {
            $this->addOne($rule);
        }
    }

    /**
     * Obtiene todos los posibles valores de un hecho.
     * @param string|null $relation
     * @return array
     */
    public function get(string $relation = null): array
    {
        if ($relation === null) {
            return $this->rules;
        }

        $relation = basename($relation);

        if (key_exists($relation, $this->rules)) {
            return $this->rules[$relation];
        }
        return [];
    }

    /**
     * Elimina de la base de reglas una relacion entera.
     * @param string $relation
     * @return void
     */
    protected function removeRelation(string $relation): void
    {
        unset($this->rules[basename($relation)]);
    }

    /**
     * Remueve un hecho específico.
     * @param Rule $rule
     * @return void
     */
    protected function removeRule(Rule $rule): void
    {
        $value = $this->value($rule);

        $key = array_search($value, $this->get($rule->conclusion->relation));

        if ($key !== false) {
            unset($this->rules[$rule->conclusion->relation][$key]);
            $this->rules[$rule->conclusion->relation] = array_values($this->rules[$rule->conclusion->relation]);
        }
    }

    /**
     * Remueve hechos. Si se pasa sin argumentos elimina todos las las
     * relaciones.
     * @param Rule|string|null $rule
     * @return void
     */
    public function remove(Rule|string $rule = null): void
    {
        if ($rule === null) {
            $this->rules = [];
            return;
        }

        if (is_string($rule)) {
            $this->removeRelation($rule);
        } else {
            $this->removeRule($rule);
        }
    }
}

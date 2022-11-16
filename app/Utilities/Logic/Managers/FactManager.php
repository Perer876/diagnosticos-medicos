<?php

namespace App\Utilities\Logic\Managers;

use App\Utilities\Logic\Contraptions\Fact;

class FactManager
{
    /**
     * @var array Arreglo con los hechos.
     * Las llaves son el nombre de la relación y los valores son un arreglo
     * con cada valor.
     */
    protected array $facts = [];

    public function __construct(Fact ...$facts)
    {
        if (sizeof($facts) !== 0) {
            $this->add(...$facts);
        }
    }

    /**
     * Agrega un hecho.
     * @param Fact $fact
     * @return void
     */
    protected function addOne(Fact $fact): void
    {
        if (!key_exists($fact->relation, $this->facts) ||
            !in_array($fact->value, $this->facts[$fact->relation])
        ) {
            $this->facts[$fact->relation][] = $fact->value;
        }
    }

    /**
     * Agrega uno o varios hechos.
     * @param Fact $fact
     * @param Fact ...$facts
     * @return void
     */
    public function add(Fact $fact, Fact ...$facts): void
    {
        $this->addOne($fact);
        foreach ($facts as $fact) {
            $this->addOne($fact);
        }
    }

    /**
     * Obtiene los valores de un hecho. En caso de llamarse sin
     * argumentos, devuelve todos los hechos y valores.
     * @param string|null $relation
     * @return array
     */
    public function get(string $relation = null): array
    {
        if ($relation === null) {
            return $this->facts;
        }

        if (key_exists($relation, $this->facts)) {
            return $this->facts[$relation];
        }
        return [];
    }

    /**
     * Elimina de la base de hechos una relacion entera.
     * @param string $relation
     * @return void
     */
    protected function removeRelation(string $relation): void
    {
        unset($this->facts[$relation]);
    }

    /**
     * Remueve un hecho específico.
     * @param Fact $fact
     * @return void
     */
    protected function removeFact(Fact $fact): void
    {
        $key = array_search($fact->value, $this->get($fact->relation));

        if ($key !== false) {
            unset($this->facts[$fact->relation][$key]);
            $this->facts[$fact->relation] = array_values($this->facts[$fact->relation]);
        }
    }

    /**
     * Remueve hechos. Si se pasa sin argumentos elimina todos las las
     * relaciones.
     * @param Fact|string|null $fact
     * @return void
     */
    public function remove(Fact|string $fact = null): void
    {
        if ($fact === null) {
            $this->facts = [];
            return;
        }

        if (is_string($fact)) {
            $this->removeRelation($fact);
        } else {
            $this->removeFact($fact);
        }
    }
}

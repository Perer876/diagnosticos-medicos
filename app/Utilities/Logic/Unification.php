<?php

namespace App\Utilities\Logic;

use App\Utilities\Logic\Contraptions\Fact;
use App\Utilities\Logic\Contraptions\Variable;

class Unification
{
    /**
     * Regresa el MGU de dos atomos/termininos, y si no ⊥ (falso) en caso de no existir
     * la unificacion.
     * @param mixed $term1
     * @param mixed $term2
     * @return array|bool
     */
    public static function unify(mixed $term1, mixed $term2): array|bool
    {
        $E = [[$term1, $term2]];
        $S = [];

        while (!empty($E)) {
            [$alpha, $beta] = static::pop($E);

            if ($beta !== $alpha) {
                if ($alpha instanceof Variable) {
                    static::replace($E, $alpha, $beta);
                    static::replace($S, $alpha, $beta);
                    $S[] = [$alpha, $beta];

                } elseif ($beta instanceof Variable) {
                    static::replace($E, $beta, $alpha);
                    static::replace($S, $beta, $alpha);
                    $S[] = [$beta, $alpha];

                } elseif (
                    $alpha instanceof Fact &&
                    $beta instanceof Fact &&
                    $alpha->relation === $beta->relation &&
                    sizeof($alpha->value) === sizeof($beta->value)
                ) {
                    foreach ($alpha->value as $key => $term) {
                        $E[] = [$term, $beta->value[$key]];
                    }
                } else {
                    return false;
                }
            }
        }

        return $S;
    }

    /**
     * Selecciona y remueve una sentencia de igualdad del array.
     * @param array $array
     * @return array
     */
    public static function pop(array &$array): array
    {
        return array_splice($array, 0, 1)[0];
    }

    /**
     * Uno varios arreglos en uno solo.
     * @param array ...$arrays
     * @return array[]
     */
    public static function union(array ...$arrays): array
    {
        return array_merge(...$arrays);
    }

    /**
     * Remplaza todas las ocurrencis de un término por otro.
     * @param array $array
     * @param $term
     * @param $withTerm
     * @return void
     */
    public static function replace(array &$array, $term, $withTerm): void
    {
        foreach ($array as $key => $sentence) {
            foreach ($sentence as $pos => $termToCompare) {
                if ($termToCompare === $term) {
                    $array[$key][$pos] = $withTerm;
                }
            }
        }
    }

    public static function replacement($S, $term)
    {
        foreach ($S as $sub) {
            [$left, $right] = $sub;
            if ($left === $term) {
                return $right;
            } elseif ($right instanceof Variable && $right === $term) {
                return $left;
            }
        }
        return null;
    }
}

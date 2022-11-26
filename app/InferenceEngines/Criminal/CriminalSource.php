<?php

namespace App\InferenceEngines\Criminal;

use App\InferenceEngines\Criminal\Relations\American;
use App\InferenceEngines\Criminal\Relations\Criminal;
use App\InferenceEngines\Criminal\Relations\Enemy;
use App\InferenceEngines\Criminal\Relations\Hostile;
use App\InferenceEngines\Criminal\Relations\Missile;
use App\InferenceEngines\Criminal\Relations\Owns;
use App\InferenceEngines\Criminal\Relations\Sells;
use App\InferenceEngines\Criminal\Relations\Weapon;
use App\Utilities\Logic\Contraptions\KnowlegdeSource;
use App\Utilities\Logic\Contraptions\Variable;

/*
  "As per the law, it is a crime for an American to sell weapons
   to hostile nations. Country A, an enemy of America, has some
   missiles, and all the missiles were sold to it by Robert, who
   is an American citizen."

   1. American (p) ∧ weapon(q) ∧ sells (p, q, r) ∧ hostile(r) → Criminal(p)
   2. Owns(A, T1)
   3. Missile(T1)
   4. ?p Missiles(p) ∧ Owns (A, p) → Sells (Robert, p, A)
   5. Missile(p) → Weapons (p)
   6. Enemy(p, America) → Hostile(p)
   7. Enemy (A, America)
   8. American(Robert).
 */
class CriminalSource extends KnowlegdeSource
{
    public static function get(): array
    {
        $p = new Variable('P');
        $q = new Variable('Q');
        $r = new Variable('R');
        $m = new Variable('M');
        $w = new Variable('W');
        $e = new Variable('E');

        return [
            Criminal::is($p)->if(
                American::is($p),
                Weapon::is($q),
                Sells::is($p, $q, $r),
                Hostile::is($r)
            ),
            Owns::is("A", "T1"),
            Missile::is("T1"),
            Sells::is("Robert", $m, "A")->if(
                Missile::is($m),
                Owns::is("A", $m)
            ),
            Weapon::is($w)->if(
                Missile::is($w)
            ),
            Hostile::is($e)->if(
                Enemy::is($e, "America"),
            ),
            Enemy::is("A", "America"),
            American::is("Robert")
        ];
    }
}

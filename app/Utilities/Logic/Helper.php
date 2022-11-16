<?php

namespace App\Utilities\Logic;

class Helper
{
    /**
     * Si el objeto es un array, lo devuelve. En caso contrario,
     * devuelve un array con el objeto.
     * @param mixed $object
     * @return array
     */
    public static function arrayable(mixed $object): array
    {
        if (!is_array($object)) {
            return array($object);
        }
        return $object;
    }
}

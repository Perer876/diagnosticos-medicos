<?php

namespace App\Utilities\Logic\Contraptions;

class Variable
{
    public ?string $name;

    public function __construct(string $name = null)
    {
        $this->name = $name;
    }
}

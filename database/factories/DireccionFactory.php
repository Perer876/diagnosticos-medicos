<?php

namespace Database\Factories;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direccion>
 */
class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $estado = Estado::inRandomOrder()->first();
        return [
            'estado_id' => $estado->id,
            'pais_id' => $estado->pais->id,
        ];
    }
}

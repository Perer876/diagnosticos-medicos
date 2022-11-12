<?php

namespace Database\Factories;

use App\Enums\Sexos;
use App\Models\Direccion;
use App\Models\Identificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identificacion_id' => Identificacion::factory()->create()->id,
            'direccion_id' => Direccion::factory()->create()->id,
            'sexo' => collect(Sexos::cases())->random()->value,
            'fecha_nacimiento' => fake()->date(),
            'antecedentes_familiares' => fake()->optional()->realText()
        ];
    }
}

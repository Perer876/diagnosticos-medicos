<?php

namespace Database\Factories;

use App\Models\Direccion;
use App\Models\Identificacion;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $identificacion = Identificacion::factory()->create();

        return [
            'alias' => fake()->numerify(Str::studly($identificacion->nombres) . "###"),
            'identificacion_id' => $identificacion->id,
            'direccion_id' => Direccion::factory()->create()->id,
            'rol_id' => Rol::inRandomOrder()->first()->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}

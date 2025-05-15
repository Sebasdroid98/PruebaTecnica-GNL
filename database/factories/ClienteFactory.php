<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identificacion' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'celular' => '+57' . $this->faker->unique()->numberBetween(3000000000, 3999999999),
            'correo' => $this->faker->unique()->safeEmail(),
            'municipio_id' => $this->faker->numberBetween(1, 10), // Cambia el rango según la cantidad de municipios
            'habeas_data' => true,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

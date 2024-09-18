<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->firstName(),
            'paterno' => $this->faker->lastName(),
            'materno' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->dateTime(max: 'now'),
            'numero' => $this->faker->numberBetween(60000000, 79999999),
            'correo' => $this->faker->unique()->safeEmail(),
            'estado' => $this->faker->boolean(),
        ];
    }
}

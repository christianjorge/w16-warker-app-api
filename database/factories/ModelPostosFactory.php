<?php

namespace Database\Factories;

use App\Models\ModelPostos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelPostosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ModelPostos::class;

    public function definition()
    {
        return [
            'cidades_id' => $this->faker->numberBetween(0, 50),
            // O campo reservatorio vai receber um numero aleatorio
            'reservatorio' => $this->faker->numberBetween(0, 100),
            // Coordenadas aleatórias
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}

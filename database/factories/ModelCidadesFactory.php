<?php

namespace Database\Factories;

use App\Models\ModelCidades;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelCidadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ModelCidades::class;

    public function definition()
    {
        return [
            // O campo nome_da_cidade vai receber uma cidade aleatoria
            'nome_da_cidade' => $this->faker->city,
            // Coordenadas aleatórias
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}

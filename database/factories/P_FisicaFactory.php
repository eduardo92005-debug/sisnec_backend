<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class P_FisicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->phoneNumber,
            'pessoa_id' => $this->faker->unique()->numberBetween(1, Pessoa::count()),
        ];
    }
}
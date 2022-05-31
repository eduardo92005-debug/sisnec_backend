<?php

namespace Database\Factories;


use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class P_JuridicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cnpjFaker =  $this->faker->randomNumber(2,true) . '.' . $this->faker->randomNumber(3,true) . '/' . $this->faker->randomNumber(4,true) . '-' . $this->faker->randomNumber(2,true);
        return [
            'cnpj' => $cnpjFaker,
            'nome_fantasia' => $this->faker->name(),
            'inscricao_estadual' => $this->faker->randomNumber(9),
            'razao_social' => $this->faker->name(),
            'pessoa_id' => $this->faker->unique()->numberBetween(1, Pessoa::count()),
        ];

    }
}

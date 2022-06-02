<?php

namespace Database\Factories;

use App\Models\P_Juridica;
use App\Models\Pessoas;
use Illuminate\Database\Eloquent\Factories\Factory;

class P_JuridicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = P_Juridica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'cnpj' => $this->faker->numerify('##.###.###/000#-##'),
        'nome_fantasia' => $this->faker->name,
        'inscricao_estadual' => $this->faker->numerify('##########.##-##'),
        'razao_social' => $this->faker->name,
        'pessoa_id' => $this->faker->unique()->numberBetween(1, Pessoa::count()),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

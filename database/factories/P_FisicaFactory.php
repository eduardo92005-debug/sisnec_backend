<?php

namespace Database\Factories;

use App\Models\P_Fisica;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class P_FisicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = P_Fisica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'cpf' => $this->faker->numerify('###.###.###-##'),
        'pessoa_id' => 1,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

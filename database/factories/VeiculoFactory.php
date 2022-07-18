<?php

namespace Database\Factories;

use App\Models\Veiculo;
use App\Models\P_Fisica;
use App\Models\P_Juridica;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'p__fisicas_id' =>  $this->faker->numberBetween(1, P_Fisica::count()),
        'p__juridicas_id' =>  $this->faker->numberBetween(1, P_Juridica::count()),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

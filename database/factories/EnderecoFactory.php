<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'rua' => $this->faker->name(),
        'complemento' => $this->faker->word,
        'bairro' => $this->faker->word,
        'cep' => $this->faker->randomNumber(),
        'estado' => $this->faker->word,
        'cidade' => $this->faker->word,
        'p__fisicas_id' => null,
        'p__juridicas_id' => null,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

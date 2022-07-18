<?php

namespace Database\Factories;

use App\Models\Pagamento;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pagamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'pessoa_id' => $this->faker->numberBetween(1, Pessoa::count()),
        'responsavel' => $this->faker->name,
        'montante' => $this->faker->randomFloat(2, 0, 100),
        'juros' => $this->faker->randomFloat(2, 0, 100),
        'vencimento' => $this->faker->date('Y-m-d'),
        'esta_vencido' => $this->faker->boolean(70),
        'pagamento_data' => $this->faker->date('Y-m-d'),
        'ultima_atualizacao' => $this->faker->date('Y-m-d'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

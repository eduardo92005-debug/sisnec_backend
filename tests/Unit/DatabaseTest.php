<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pessoa;
use App\Models\P_Fisica;
use App\Models\P_Juridica;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_models_can_be_persisted()
    {
        $pessoa = Pessoa::factory()->count(3)->create();
        $fisica = P_Fisica::factory()->createOne();
        $juridica = P_Juridica::factory()->createOne();
        $this->assertNotNull($pessoa[0]->id);
        $this->assertNotNull($fisica->cpf);
        $this->assertNotNull($juridica->cnpj);
    }

    public function test_p_fisica_and_p_juridica_has_pessoa(){
        $pessoa = Pessoa::factory()->count(3)->create();
        $fisica = P_Fisica::factory()->createOne([
            'pessoa_id' => $pessoa[0]->id
        ]);
        $juridica = P_Juridica::factory()->createOne([
            'pessoa_id' => $pessoa[1]->id
        ]);
        $this->assertNotNull($fisica->pessoa);
        $this->assertNotNull($juridica->pessoa);
    }

    public function test_p_fisica_returns_correctly_cpf(){
        $cpfRegex ='/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/';
        $pessoa = Pessoa::factory()->count(3)->create();
        $fisica = P_Fisica::factory()->createOne([
            'pessoa_id' => $pessoa[0]->id
        ]);
        $this->assertMatchesRegularExpression($cpfRegex, $fisica->cpf);
    }

    public function test_p_juridica_returns_correctly_cnpj(){
        $cnpjRegex ='/^\d{2}\.\d{3}\/\d{4}\-\d{2}$/';
        $pessoa = Pessoa::factory()->count(3)->create();
        $juridica = P_Juridica::factory()->createOne([
            'pessoa_id' => $pessoa[0]->id
        ]);
        $this->assertMatchesRegularExpression($cnpjRegex, $juridica->cnpj);
    }
}

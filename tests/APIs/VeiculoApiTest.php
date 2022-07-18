<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Veiculo;

class VeiculoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_veiculo()
    {
        $veiculo = Veiculo::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/veiculos', $veiculo
        );

        $this->assertApiResponse($veiculo);
    }

    /**
     * @test
     */
    public function test_read_veiculo()
    {
        $veiculo = Veiculo::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/v1/veiculos/'.$veiculo->id
        );

        $this->assertApiResponse($veiculo->toArray());
    }

    /**
     * @test
     */
    public function test_update_veiculo()
    {
        $veiculo = Veiculo::factory()->create();
        $editedVeiculo = Veiculo::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/veiculos/'.$veiculo->id,
            $editedVeiculo
        );

        $this->assertApiResponse($editedVeiculo);
    }

    /**
     * @test
     */
    public function test_delete_veiculo()
    {
        $veiculo = Veiculo::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/veiculos/'.$veiculo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/veiculos/'.$veiculo->id
        );

        $this->response->assertStatus(404);
    }
}

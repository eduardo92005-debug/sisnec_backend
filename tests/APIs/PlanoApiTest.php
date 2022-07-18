<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Plano;

class PlanoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_plano()
    {
        $plano = Plano::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/planos', $plano
        );

        $this->assertApiResponse($plano);
    }

    /**
     * @test
     */
    public function test_read_plano()
    {
        $plano = Plano::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/v1/planos/'.$plano->id
        );

        $this->assertApiResponse($plano->toArray());
    }

    /**
     * @test
     */
    public function test_update_plano()
    {
        $plano = Plano::factory()->create();
        $editedPlano = Plano::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/planos/'.$plano->id,
            $editedPlano
        );

        $this->assertApiResponse($editedPlano);
    }

    /**
     * @test
     */
    public function test_delete_plano()
    {
        $plano = Plano::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/planos/'.$plano->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/planos/'.$plano->id
        );

        $this->response->assertStatus(404);
    }
}

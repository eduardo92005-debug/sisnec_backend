<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\P_Juridica;

class P_JuridicaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/p__juridicas', $pJuridica
        );

        $this->assertApiResponse($pJuridica);
    }

    /**
     * @test
     */
    public function test_read_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/p__juridicas/'.$pJuridica->id
        );

        $this->assertApiResponse($pJuridica->toArray());
    }

    /**
     * @test
     */
    public function test_update_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();
        $editedP_Juridica = P_Juridica::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/p__juridicas/'.$pJuridica->id,
            $editedP_Juridica
        );

        $this->assertApiResponse($editedP_Juridica);
    }

    /**
     * @test
     */
    public function test_delete_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/p__juridicas/'.$pJuridica->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/p__juridicas/'.$pJuridica->id
        );

        $this->response->assertStatus(404);
    }
}

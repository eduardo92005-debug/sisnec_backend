<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\P_Fisica;
use App\Models\Pessoa;

class P_FisicaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()
                ->make( ['pessoa_id' => $pessoa->id ])
                ->toArray();
 


        $this->response = $this->json(
            'POST',
            '/api/v1/p__fisicas', $pFisica
        );

        $this->assertApiResponse($pFisica);
    }

    /**
     * @test
     */
    public function test_read_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id]);

        $this->response = $this->json(
            'GET',
            '/api/v1/p__fisicas/'.$pFisica->id
        );

        $this->assertApiResponse($pFisica->toArray());
    }

    /**
     * @test
     */
    public function test_update_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id]);
        $editedP_Fisica = P_Fisica::factory()
                ->make(['pessoa_id' => $pessoa->id])
                ->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/p__fisicas/'.$pFisica->id,
            $editedP_Fisica
        );

        $this->assertApiResponse($editedP_Fisica);
    }

    /**
     * @test
     */
    public function test_delete_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id]);

        $this->response = $this->json(
            'DELETE',
             '/api/v1/p__fisicas/'.$pFisica->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/p__fisicas/'.$pFisica->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pessoa;

class PessoaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pessoa()
    {
        $pessoa = Pessoa::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/pessoas', $pessoa
        );

        $this->assertApiResponse($pessoa);
    }

    /**
     * @test
     */
    public function test_read_pessoa()
    {
        $pessoa = Pessoa::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/v1/pessoas/'.$pessoa->id
        );

        $this->assertApiResponse($pessoa->toArray());
    }

    /**
     * @test
     */
    public function test_update_pessoa()
    {
        $pessoa = Pessoa::factory()->create();
        $editedPessoa = Pessoa::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/pessoas/'.$pessoa->id,
            $editedPessoa
        );

        $this->assertApiResponse($editedPessoa);
    }

    /**
     * @test
     */
    public function test_delete_pessoa()
    {
        $pessoa = Pessoa::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/pessoas/'.$pessoa->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/pessoas/'.$pessoa->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pagamento;

class PagamentoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pagamento()
    {
        $pagamento = Pagamento::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pagamentos', $pagamento
        );

        $this->assertApiResponse($pagamento);
    }

    /**
     * @test
     */
    public function test_read_pagamento()
    {
        $pagamento = Pagamento::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pagamentos/'.$pagamento->id
        );

        $this->assertApiResponse($pagamento->toArray());
    }

    /**
     * @test
     */
    public function test_update_pagamento()
    {
        $pagamento = Pagamento::factory()->create();
        $editedPagamento = Pagamento::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pagamentos/'.$pagamento->id,
            $editedPagamento
        );

        $this->assertApiResponse($editedPagamento);
    }

    /**
     * @test
     */
    public function test_delete_pagamento()
    {
        $pagamento = Pagamento::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pagamentos/'.$pagamento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pagamentos/'.$pagamento->id
        );

        $this->response->assertStatus(404);
    }
}

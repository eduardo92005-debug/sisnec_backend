<?php namespace Tests\Repositories;

use App\Models\Pagamento;
use App\Repositories\PagamentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PagamentoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PagamentoRepository
     */
    protected $pagamentoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pagamentoRepo = \App::make(PagamentoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pagamento()
    {
        $pagamento = Pagamento::factory()->make()->toArray();

        $createdPagamento = $this->pagamentoRepo->create($pagamento);

        $createdPagamento = $createdPagamento->toArray();
        $this->assertArrayHasKey('id', $createdPagamento);
        $this->assertNotNull($createdPagamento['id'], 'Created Pagamento must have id specified');
        $this->assertNotNull(Pagamento::find($createdPagamento['id']), 'Pagamento with given id must be in DB');
        $this->assertModelData($pagamento, $createdPagamento);
    }

    /**
     * @test read
     */
    public function test_read_pagamento()
    {
        $pagamento = Pagamento::factory()->create();

        $dbPagamento = $this->pagamentoRepo->find($pagamento->id);

        $dbPagamento = $dbPagamento->toArray();
        $this->assertModelData($pagamento->toArray(), $dbPagamento);
    }

    /**
     * @test update
     */
    public function test_update_pagamento()
    {
        $pagamento = Pagamento::factory()->create();
        $fakePagamento = Pagamento::factory()->make()->toArray();

        $updatedPagamento = $this->pagamentoRepo->update($fakePagamento, $pagamento->id);

        $this->assertModelData($fakePagamento, $updatedPagamento->toArray());
        $dbPagamento = $this->pagamentoRepo->find($pagamento->id);
        $this->assertModelData($fakePagamento, $dbPagamento->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pagamento()
    {
        $pagamento = Pagamento::factory()->create();

        $resp = $this->pagamentoRepo->delete($pagamento->id);

        $this->assertTrue($resp);
        $this->assertNull(Pagamento::find($pagamento->id), 'Pagamento should not exist in DB');
    }
}

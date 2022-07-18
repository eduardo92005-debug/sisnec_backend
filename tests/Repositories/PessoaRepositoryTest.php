<?php namespace Tests\Repositories;

use App\Models\Pessoa;
use App\Repositories\PessoaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PessoaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PessoaRepository
     */
    protected $pessoaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pessoaRepo = \App::make(PessoaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pessoa()
    {
        $pessoa = Pessoa::factory()->make()->toArray();

        $createdPessoa = $this->pessoaRepo->create($pessoa);

        $createdPessoa = $createdPessoa->toArray();
        $this->assertArrayHasKey('id', $createdPessoa);
        $this->assertNotNull($createdPessoa['id'], 'Created Pessoa must have id specified');
        $this->assertNotNull(Pessoa::find($createdPessoa['id']), 'Pessoa with given id must be in DB');
        $this->assertModelData($pessoa, $createdPessoa);
    }

    /**
     * @test read
     */
    public function test_read_pessoa()
    {
        $pessoa = Pessoa::factory()->create();

        $dbPessoa = $this->pessoaRepo->find($pessoa->id);

        $dbPessoa = $dbPessoa->toArray();
        $this->assertModelData($pessoa->toArray(), $dbPessoa);
    }

    /**
     * @test update
     */
    public function test_update_pessoa()
    {
        $pessoa = Pessoa::factory()->create();
        $fakePessoa = Pessoa::factory()->make()->toArray();

        $updatedPessoa = $this->pessoaRepo->update($fakePessoa, $pessoa->id);

        $this->assertModelData($fakePessoa, $updatedPessoa->toArray());
        $dbPessoa = $this->pessoaRepo->find($pessoa->id);
        $this->assertModelData($fakePessoa, $dbPessoa->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pessoa()
    {
        $pessoa = Pessoa::factory()->create();

        $resp = $this->pessoaRepo->delete($pessoa->id);

        $this->assertTrue($resp);
        $this->assertNull(Pessoa::find($pessoa->id), 'Pessoa should not exist in DB');
    }
}

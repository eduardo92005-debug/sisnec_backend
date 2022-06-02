<?php namespace Tests\Repositories;

use App\Models\P_Juridica;
use App\Repositories\P_JuridicaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class P_JuridicaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var P_JuridicaRepository
     */
    protected $pJuridicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pJuridicaRepo = \App::make(P_JuridicaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->make()->toArray();

        $createdP_Juridica = $this->pJuridicaRepo->create($pJuridica);

        $createdP_Juridica = $createdP_Juridica->toArray();
        $this->assertArrayHasKey('id', $createdP_Juridica);
        $this->assertNotNull($createdP_Juridica['id'], 'Created P_Juridica must have id specified');
        $this->assertNotNull(P_Juridica::find($createdP_Juridica['id']), 'P_Juridica with given id must be in DB');
        $this->assertModelData($pJuridica, $createdP_Juridica);
    }

    /**
     * @test read
     */
    public function test_read_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();

        $dbP_Juridica = $this->pJuridicaRepo->find($pJuridica->id);

        $dbP_Juridica = $dbP_Juridica->toArray();
        $this->assertModelData($pJuridica->toArray(), $dbP_Juridica);
    }

    /**
     * @test update
     */
    public function test_update_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();
        $fakeP_Juridica = P_Juridica::factory()->make()->toArray();

        $updatedP_Juridica = $this->pJuridicaRepo->update($fakeP_Juridica, $pJuridica->id);

        $this->assertModelData($fakeP_Juridica, $updatedP_Juridica->toArray());
        $dbP_Juridica = $this->pJuridicaRepo->find($pJuridica->id);
        $this->assertModelData($fakeP_Juridica, $dbP_Juridica->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_p__juridica()
    {
        $pJuridica = P_Juridica::factory()->create();

        $resp = $this->pJuridicaRepo->delete($pJuridica->id);

        $this->assertTrue($resp);
        $this->assertNull(P_Juridica::find($pJuridica->id), 'P_Juridica should not exist in DB');
    }
}

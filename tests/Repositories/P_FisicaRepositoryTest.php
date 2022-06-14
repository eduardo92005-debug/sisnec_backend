<?php namespace Tests\Repositories;

use App\Models\P_Fisica;
use App\Models\Pessoa;
use App\Repositories\P_FisicaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class P_FisicaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var P_FisicaRepository
     */
    protected $pFisicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pFisicaRepo = \App::make(P_FisicaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->make(['pessoa_id' => $pessoa->id ])->toArray();

        $createdP_Fisica = $this->pFisicaRepo->create($pFisica);

        $createdP_Fisica = $createdP_Fisica->toArray();
        $this->assertArrayHasKey('id', $createdP_Fisica);
        $this->assertNotNull($createdP_Fisica['id'], 'Created P_Fisica must have id specified');
        $this->assertNotNull(P_Fisica::find($createdP_Fisica['id']), 'P_Fisica with given id must be in DB');
        $this->assertModelData($pFisica, $createdP_Fisica);
    }

    /**
     * @test read
     */
    public function test_read_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id ]);

        $dbP_Fisica = $this->pFisicaRepo->find($pFisica->id);

        $dbP_Fisica = $dbP_Fisica->toArray();
        $this->assertModelData($pFisica->toArray(), $dbP_Fisica);
    }

    /**
     * @test update
     */
    public function test_update_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id ]);
        $fakeP_Fisica = P_Fisica::factory()->make(['pessoa_id' => $pessoa->id ])->toArray();

        $updatedP_Fisica = $this->pFisicaRepo->update($fakeP_Fisica, $pFisica->id);

        $this->assertModelData($fakeP_Fisica, $updatedP_Fisica->toArray());
        $dbP_Fisica = $this->pFisicaRepo->find($pFisica->id);
        $this->assertModelData($fakeP_Fisica, $dbP_Fisica->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_p__fisica()
    {
        $pessoa = Pessoa::factory()->createOne();
        $pFisica = P_Fisica::factory()->create(['pessoa_id' => $pessoa->id ]);

        $resp = $this->pFisicaRepo->delete($pFisica->id);

        $this->assertTrue($resp);
        $this->assertNull(P_Fisica::find($pFisica->id), 'P_Fisica should not exist in DB');
    }
}

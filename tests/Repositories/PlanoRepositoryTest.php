<?php namespace Tests\Repositories;

use App\Models\Plano;
use App\Repositories\PlanoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PlanoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PlanoRepository
     */
    protected $planoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->planoRepo = \App::make(PlanoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_plano()
    {
        $plano = Plano::factory()->make()->toArray();

        $createdPlano = $this->planoRepo->create($plano);

        $createdPlano = $createdPlano->toArray();
        $this->assertArrayHasKey('id', $createdPlano);
        $this->assertNotNull($createdPlano['id'], 'Created Plano must have id specified');
        $this->assertNotNull(Plano::find($createdPlano['id']), 'Plano with given id must be in DB');
        $this->assertModelData($plano, $createdPlano);
    }

    /**
     * @test read
     */
    public function test_read_plano()
    {
        $plano = Plano::factory()->create();

        $dbPlano = $this->planoRepo->find($plano->id);

        $dbPlano = $dbPlano->toArray();
        $this->assertModelData($plano->toArray(), $dbPlano);
    }

    /**
     * @test update
     */
    public function test_update_plano()
    {
        $plano = Plano::factory()->create();
        $fakePlano = Plano::factory()->make()->toArray();

        $updatedPlano = $this->planoRepo->update($fakePlano, $plano->id);

        $this->assertModelData($fakePlano, $updatedPlano->toArray());
        $dbPlano = $this->planoRepo->find($plano->id);
        $this->assertModelData($fakePlano, $dbPlano->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_plano()
    {
        $plano = Plano::factory()->create();

        $resp = $this->planoRepo->delete($plano->id);

        $this->assertTrue($resp);
        $this->assertNull(Plano::find($plano->id), 'Plano should not exist in DB');
    }
}

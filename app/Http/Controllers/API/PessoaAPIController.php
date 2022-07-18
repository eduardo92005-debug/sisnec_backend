<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePessoaAPIRequest;
use App\Http\Requests\API\UpdatePessoaAPIRequest;
use App\Models\Pessoa;
use App\Models\P_Juridica;
use App\Repositories\PessoaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PessoaController
 * @package App\Http\Controllers\API
 */

class PessoaAPIController extends AppBaseController
{
    /** @var  PessoaRepository */
    private $pessoaRepository;

    public function __construct(PessoaRepository $pessoaRepo)
    {
        $this->pessoaRepository = $pessoaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pessoas",
     *      summary="Get a listing of the Pessoas.",
     *      tags={"Pessoa"},
     *      description="Get all Pessoas",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Pessoa")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $pessoas = $this->pessoaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pessoas->toArray(), 'Pessoas retrieved successfully');
    }

    /**
     * @param CreatePessoaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pessoas",
     *      summary="Store a newly created Pessoa in storage",
     *      tags={"Pessoa"},
     *      description="Store Pessoa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pessoa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pessoa")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pessoa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePessoaAPIRequest $request)
    {
        $input = $request->all();

        $pessoa = $this->pessoaRepository->create($input);

        return $this->sendResponse($pessoa->toArray(), 'Pessoa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pessoas/{id}",
     *      summary="Display the specified Pessoa",
     *      tags={"Pessoa"},
     *      description="Get Pessoa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pessoa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pessoa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Pessoa $pessoa */
        //$pessoa = $this->pessoaRepository->find($id);
        $pessoa = $this->pessoaRepository->find($id);
        if (empty($pessoa)) {
            return $this->sendError('Pessoa not found');
        }

        if(!empty($pessoa->p_juridica)){
            $pJuridica = $pessoa->p_juridica->where('pessoa_id', $id)->first();
            $pessoa->push($pJuridica);
        } else {
            return $this->sendError('Pessoa Juridica not found');
        }

        return $this->sendResponse($pessoa->toArray(), 'Pessoa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePessoaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pessoas/{id}",
     *      summary="Update the specified Pessoa in storage",
     *      tags={"Pessoa"},
     *      description="Update Pessoa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pessoa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pessoa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pessoa")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pessoa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePessoaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pessoa $pessoa */
        $pessoa = $this->pessoaRepository->find($id);

        if (empty($pessoa)) {
            return $this->sendError('Pessoa not found');
        }

        $pessoa = $this->pessoaRepository->update($input, $id);

        return $this->sendResponse($pessoa->toArray(), 'Pessoa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pessoas/{id}",
     *      summary="Remove the specified Pessoa from storage",
     *      tags={"Pessoa"},
     *      description="Delete Pessoa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pessoa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Pessoa $pessoa */
        $pessoa = $this->pessoaRepository->find($id);

        if (empty($pessoa)) {
            return $this->sendError('Pessoa not found');
        }

        $pessoa->delete();

        return $this->sendSuccess('Pessoa deleted successfully');
    }
}

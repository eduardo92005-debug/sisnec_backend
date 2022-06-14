<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateP_JuridicaAPIRequest;
use App\Http\Requests\API\UpdateP_JuridicaAPIRequest;
use App\Models\P_Juridica;
use App\Repositories\P_JuridicaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class P_JuridicaController
 * @package App\Http\Controllers\API
 */

class P_JuridicaAPIController extends AppBaseController
{
    /** @var  P_JuridicaRepository */
    private $pJuridicaRepository;

    public function __construct(P_JuridicaRepository $pJuridicaRepo)
    {
        $this->pJuridicaRepository = $pJuridicaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/p__juridicas",
     *      summary="Get a listing of the P_Juridicas.",
     *      tags={"P_Juridica"},
     *      description="Get all P_Juridicas",
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
     *                  @SWG\Items(ref="#/definitions/P_Juridica")
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
        $pJuridicas = $this->pJuridicaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pJuridicas->toArray(), 'P  Juridicas retrieved successfully');
    }

    /**
     * @param CreateP_JuridicaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/p__juridicas",
     *      summary="Store a newly created P_Juridica in storage",
     *      tags={"P_Juridica"},
     *      description="Store P_Juridica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="P_Juridica that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/P_Juridica")
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
     *                  ref="#/definitions/P_Juridica"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateP_JuridicaAPIRequest $request)
    {
        $input = $request->all();

        $pJuridica = $this->pJuridicaRepository->create($input);

        return $this->sendResponse($pJuridica->toArray(), 'P  Juridica saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/p__juridicas/{id}",
     *      summary="Display the specified P_Juridica",
     *      tags={"P_Juridica"},
     *      description="Get P_Juridica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Juridica",
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
     *                  ref="#/definitions/P_Juridica"
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
        /** @var P_Juridica $pJuridica */
        $pJuridica = $this->pJuridicaRepository->find($id);

        if (empty($pJuridica)) {
            return $this->sendError('P  Juridica not found');
        }

        return $this->sendResponse($pJuridica->toArray(), 'P  Juridica retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateP_JuridicaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/p__juridicas/{id}",
     *      summary="Update the specified P_Juridica in storage",
     *      tags={"P_Juridica"},
     *      description="Update P_Juridica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Juridica",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="P_Juridica that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/P_Juridica")
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
     *                  ref="#/definitions/P_Juridica"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateP_JuridicaAPIRequest $request)
    {
        $input = $request->all();

        /** @var P_Juridica $pJuridica */
        $pJuridica = $this->pJuridicaRepository->find($id);

        if (empty($pJuridica)) {
            return $this->sendError('P  Juridica not found');
        }

        $pJuridica = $this->pJuridicaRepository->update($input, $id);

        return $this->sendResponse($pJuridica->toArray(), 'P_Juridica updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/p__juridicas/{id}",
     *      summary="Remove the specified P_Juridica from storage",
     *      tags={"P_Juridica"},
     *      description="Delete P_Juridica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Juridica",
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
        /** @var P_Juridica $pJuridica */
        $pJuridica = $this->pJuridicaRepository->find($id);

        if (empty($pJuridica)) {
            return $this->sendError('P  Juridica not found');
        }

        $pJuridica->delete();

        return $this->sendSuccess('P  Juridica deleted successfully');
    }
}

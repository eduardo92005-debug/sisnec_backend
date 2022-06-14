<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateP_FisicaAPIRequest;
use App\Http\Requests\API\UpdateP_FisicaAPIRequest;
use App\Models\P_Fisica;
use App\Repositories\P_FisicaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class P_FisicaController
 * @package App\Http\Controllers\API
 */

class P_FisicaAPIController extends AppBaseController
{
    /** @var  P_FisicaRepository */
    private $pFisicaRepository;

    public function __construct(P_FisicaRepository $pFisicaRepo)
    {
        $this->pFisicaRepository = $pFisicaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/p__fisicas",
     *      summary="Get a listing of the P_Fisicas.",
     *      tags={"P_Fisica"},
     *      description="Get all P_Fisicas",
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
     *                  @SWG\Items(ref="#/definitions/P_Fisica")
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
        $pFisicas = $this->pFisicaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pFisicas->toArray(), 'P  Fisicas retrieved successfully');
    }

    /**
     * @param CreateP_FisicaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/p__fisicas",
     *      summary="Store a newly created P_Fisica in storage",
     *      tags={"P_Fisica"},
     *      description="Store P_Fisica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="P_Fisica that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/P_Fisica")
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
     *                  ref="#/definitions/P_Fisica"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateP_FisicaAPIRequest $request)
    {
        $input = $request->all();

        $pFisica = $this->pFisicaRepository->create($input);

        return $this->sendResponse($pFisica->toArray(), 'P  Fisica saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/p__fisicas/{id}",
     *      summary="Display the specified P_Fisica",
     *      tags={"P_Fisica"},
     *      description="Get P_Fisica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Fisica",
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
     *                  ref="#/definitions/P_Fisica"
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
        /** @var P_Fisica $pFisica */
        $pFisica = $this->pFisicaRepository->find($id);

        if (empty($pFisica)) {
            return $this->sendError('P_Fisica not found');
        }

        return $this->sendResponse($pFisica->toArray(), 'P__Fisica retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateP_FisicaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/p__fisicas/{id}",
     *      summary="Update the specified P_Fisica in storage",
     *      tags={"P_Fisica"},
     *      description="Update P_Fisica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Fisica",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="P_Fisica that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/P_Fisica")
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
     *                  ref="#/definitions/P_Fisica"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateP_FisicaAPIRequest $request)
    {
        $input = $request->all();

        /** @var P_Fisica $pFisica */
        $pFisica = $this->pFisicaRepository->find($id);

        if (empty($pFisica)) {
            return $this->sendError('P  Fisica not found');
        }

        $pFisica = $this->pFisicaRepository->update($input, $id);

        return $this->sendResponse($pFisica->toArray(), 'P_Fisica updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/p__fisicas/{id}",
     *      summary="Remove the specified P_Fisica from storage",
     *      tags={"P_Fisica"},
     *      description="Delete P_Fisica",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of P_Fisica",
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
        /** @var P_Fisica $pFisica */
        $pFisica = $this->pFisicaRepository->find($id);

        if (empty($pFisica)) {
            return $this->sendError('P_Fisica not found');
        }

        $pFisica->delete();

        return $this->sendSuccess('P__Fisica deleted successfully');
    }
}

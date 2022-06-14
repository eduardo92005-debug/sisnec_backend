<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlanoAPIRequest;
use App\Http\Requests\API\UpdatePlanoAPIRequest;
use App\Models\Plano;
use App\Repositories\PlanoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlanoController
 * @package App\Http\Controllers\API
 */

class PlanoAPIController extends AppBaseController
{
    /** @var  PlanoRepository */
    private $planoRepository;

    public function __construct(PlanoRepository $planoRepo)
    {
        $this->planoRepository = $planoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/planos",
     *      summary="Get a listing of the Planos.",
     *      tags={"Plano"},
     *      description="Get all Planos",
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
     *                  @SWG\Items(ref="#/definitions/Plano")
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
        $planos = $this->planoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($planos->toArray(), 'Planos retrieved successfully');
    }

    /**
     * @param CreatePlanoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/planos",
     *      summary="Store a newly created Plano in storage",
     *      tags={"Plano"},
     *      description="Store Plano",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Plano that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Plano")
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
     *                  ref="#/definitions/Plano"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePlanoAPIRequest $request)
    {
        $input = $request->all();

        $plano = $this->planoRepository->create($input);

        return $this->sendResponse($plano->toArray(), 'Plano saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/planos/{id}",
     *      summary="Display the specified Plano",
     *      tags={"Plano"},
     *      description="Get Plano",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plano",
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
     *                  ref="#/definitions/Plano"
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
        /** @var Plano $plano */
        $plano = $this->planoRepository->find($id);

        if (empty($plano)) {
            return $this->sendError('Plano not found');
        }

        return $this->sendResponse($plano->toArray(), 'Plano retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePlanoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/planos/{id}",
     *      summary="Update the specified Plano in storage",
     *      tags={"Plano"},
     *      description="Update Plano",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plano",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Plano that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Plano")
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
     *                  ref="#/definitions/Plano"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePlanoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Plano $plano */
        $plano = $this->planoRepository->find($id);

        if (empty($plano)) {
            return $this->sendError('Plano not found');
        }

        $plano = $this->planoRepository->update($input, $id);

        return $this->sendResponse($plano->toArray(), 'Plano updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/planos/{id}",
     *      summary="Remove the specified Plano from storage",
     *      tags={"Plano"},
     *      description="Delete Plano",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plano",
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
        /** @var Plano $plano */
        $plano = $this->planoRepository->find($id);

        if (empty($plano)) {
            return $this->sendError('Plano not found');
        }

        $plano->delete();

        return $this->sendSuccess('Plano deleted successfully');
    }
}

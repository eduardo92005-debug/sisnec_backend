<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePagamentoAPIRequest;
use App\Http\Requests\API\UpdatePagamentoAPIRequest;
use App\Models\Pagamento;
use App\Repositories\PagamentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PagamentoController
 * @package App\Http\Controllers\API
 */

class PagamentoAPIController extends AppBaseController
{
    /** @var  PagamentoRepository */
    private $pagamentoRepository;

    public function __construct(PagamentoRepository $pagamentoRepo)
    {
        $this->pagamentoRepository = $pagamentoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pagamentos",
     *      summary="Get a listing of the Pagamentos.",
     *      tags={"Pagamento"},
     *      description="Get all Pagamentos",
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
     *                  @SWG\Items(ref="#/definitions/Pagamento")
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
        $pagamentos = $this->pagamentoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pagamentos->toArray(), 'Pagamentos retrieved successfully');
    }

    /**
     * @param CreatePagamentoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pagamentos",
     *      summary="Store a newly created Pagamento in storage",
     *      tags={"Pagamento"},
     *      description="Store Pagamento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pagamento that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pagamento")
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
     *                  ref="#/definitions/Pagamento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePagamentoAPIRequest $request)
    {
        $input = $request->all();

        $pagamento = $this->pagamentoRepository->create($input);

        return $this->sendResponse($pagamento->toArray(), 'Pagamento saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pagamentos/{id}",
     *      summary="Display the specified Pagamento",
     *      tags={"Pagamento"},
     *      description="Get Pagamento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pagamento",
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
     *                  ref="#/definitions/Pagamento"
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
        /** @var Pagamento $pagamento */
        $pagamento = $this->pagamentoRepository->find($id);

        if (empty($pagamento)) {
            return $this->sendError('Pagamento not found');
        }

        return $this->sendResponse($pagamento->toArray(), 'Pagamento retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePagamentoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pagamentos/{id}",
     *      summary="Update the specified Pagamento in storage",
     *      tags={"Pagamento"},
     *      description="Update Pagamento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pagamento",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pagamento that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pagamento")
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
     *                  ref="#/definitions/Pagamento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePagamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pagamento $pagamento */
        $pagamento = $this->pagamentoRepository->find($id);

        if (empty($pagamento)) {
            return $this->sendError('Pagamento not found');
        }

        $pagamento = $this->pagamentoRepository->update($input, $id);

        return $this->sendResponse($pagamento->toArray(), 'Pagamento updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pagamentos/{id}",
     *      summary="Remove the specified Pagamento from storage",
     *      tags={"Pagamento"},
     *      description="Delete Pagamento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pagamento",
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
        /** @var Pagamento $pagamento */
        $pagamento = $this->pagamentoRepository->find($id);

        if (empty($pagamento)) {
            return $this->sendError('Pagamento not found');
        }

        $pagamento->delete();

        return $this->sendSuccess('Pagamento deleted successfully');
    }
}

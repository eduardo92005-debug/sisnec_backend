<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Veiculo\BulkDestroyVeiculo;
use App\Http\Requests\Admin\Veiculo\DestroyVeiculo;
use App\Http\Requests\Admin\Veiculo\IndexVeiculo;
use App\Http\Requests\Admin\Veiculo\StoreVeiculo;
use App\Http\Requests\Admin\Veiculo\UpdateVeiculo;
use App\Models\Veiculo;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VeiculosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVeiculo $request
     * @return array|Factory|View
     */
    public function index(IndexVeiculo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Veiculo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'p__fisicas_id', 'p__juridicas_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.veiculo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.veiculo.create');

        return view('admin.veiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVeiculo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVeiculo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Veiculo
        $veiculo = Veiculo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/veiculos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/veiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param Veiculo $veiculo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Veiculo $veiculo)
    {
        $this->authorize('admin.veiculo.show', $veiculo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Veiculo $veiculo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Veiculo $veiculo)
    {
        $this->authorize('admin.veiculo.edit', $veiculo);


        return view('admin.veiculo.edit', [
            'veiculo' => $veiculo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVeiculo $request
     * @param Veiculo $veiculo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVeiculo $request, Veiculo $veiculo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Veiculo
        $veiculo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/veiculos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/veiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVeiculo $request
     * @param Veiculo $veiculo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVeiculo $request, Veiculo $veiculo)
    {
        $veiculo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVeiculo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVeiculo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('veiculos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

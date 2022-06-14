<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Plano\BulkDestroyPlano;
use App\Http\Requests\Admin\Plano\DestroyPlano;
use App\Http\Requests\Admin\Plano\IndexPlano;
use App\Http\Requests\Admin\Plano\StorePlano;
use App\Http\Requests\Admin\Plano\UpdatePlano;
use App\Models\Plano;
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

class PlanosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPlano $request
     * @return array|Factory|View
     */
    public function index(IndexPlano $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Plano::class)->processRequestAndGet(
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

        return view('admin.plano.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.plano.create');

        return view('admin.plano.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlano $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePlano $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Plano
        $plano = Plano::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/planos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/planos');
    }

    /**
     * Display the specified resource.
     *
     * @param Plano $plano
     * @throws AuthorizationException
     * @return void
     */
    public function show(Plano $plano)
    {
        $this->authorize('admin.plano.show', $plano);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Plano $plano
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Plano $plano)
    {
        $this->authorize('admin.plano.edit', $plano);


        return view('admin.plano.edit', [
            'plano' => $plano,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlano $request
     * @param Plano $plano
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePlano $request, Plano $plano)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Plano
        $plano->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/planos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/planos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPlano $request
     * @param Plano $plano
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPlano $request, Plano $plano)
    {
        $plano->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPlano $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPlano $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('planos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Endereco\BulkDestroyEndereco;
use App\Http\Requests\Admin\Endereco\DestroyEndereco;
use App\Http\Requests\Admin\Endereco\IndexEndereco;
use App\Http\Requests\Admin\Endereco\StoreEndereco;
use App\Http\Requests\Admin\Endereco\UpdateEndereco;
use App\Models\Endereco;
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

class EnderecosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEndereco $request
     * @return array|Factory|View
     */
    public function index(IndexEndereco $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Endereco::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bairro', 'cep', 'cidade', 'complemento', 'estado', 'id', 'p__fisicas_id', 'p__juridicas_id', 'rua'],

            // set columns to searchIn
            ['bairro', 'cep', 'cidade', 'complemento', 'estado', 'id', 'rua']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.endereco.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.endereco.create');

        return view('admin.endereco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEndereco $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEndereco $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Endereco
        $endereco = Endereco::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/enderecos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/enderecos');
    }

    /**
     * Display the specified resource.
     *
     * @param Endereco $endereco
     * @throws AuthorizationException
     * @return void
     */
    public function show(Endereco $endereco)
    {
        $this->authorize('admin.endereco.show', $endereco);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Endereco $endereco
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Endereco $endereco)
    {
        $this->authorize('admin.endereco.edit', $endereco);


        return view('admin.endereco.edit', [
            'endereco' => $endereco,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEndereco $request
     * @param Endereco $endereco
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEndereco $request, Endereco $endereco)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Endereco
        $endereco->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/enderecos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/enderecos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEndereco $request
     * @param Endereco $endereco
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEndereco $request, Endereco $endereco)
    {
        $endereco->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEndereco $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEndereco $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('enderecos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PJuridica\BulkDestroyPJuridica;
use App\Http\Requests\Admin\PJuridica\DestroyPJuridica;
use App\Http\Requests\Admin\PJuridica\IndexPJuridica;
use App\Http\Requests\Admin\PJuridica\StorePJuridica;
use App\Http\Requests\Admin\PJuridica\UpdatePJuridica;
use App\Models\PJuridica;
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
use App\Models\Pessoa;

class PJuridicasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPJuridica $request
     * @return array|Factory|View
     */
    public function index(IndexPJuridica $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PJuridica::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'cnpj', 'nome_fantasia', 'inscricao_estadual', 'razao_social', 'pessoa_id'],

            // set columns to searchIn
            ['id', 'cnpj', 'nome_fantasia', 'inscricao_estadual', 'razao_social'],

            function ($query) use ($request) {
                $query->with(['pessoas']); //with -> (relationship name)
                if($request->has('pessoas')){
                    $query->whereIn('pessoa_id', $request->get('pessoas'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.p-juridica.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.p-juridica.create');

        return view('admin.p-juridica.create', [
            'pessoas' => Pessoa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePJuridica $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePJuridica $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        //Use sanitezed request for  get data foreign key id (pessoa_id)
        $sanitized['pessoa_id'] = $request->getPessoaId();
        // Store the PJuridica
        $pJuridica = PJuridica::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/p-juridicas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/p-juridicas');
    }

    /**
     * Display the specified resource.
     *
     * @param PJuridica $pJuridica
     * @throws AuthorizationException
     * @return void
     */
    public function show(PJuridica $pJuridica)
    {
        $this->authorize('admin.p-juridica.show', $pJuridica);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PJuridica $pJuridica
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PJuridica $pJuridica)
    {
        $this->authorize('admin.p-juridica.edit', $pJuridica);


        return view('admin.p-juridica.edit', [
            'pJuridica' => $pJuridica,
            'pessoas' => Pessoa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePJuridica $request
     * @param PJuridica $pJuridica
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePJuridica $request, PJuridica $pJuridica)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['pessoa_id'] = $request->getPessoaId();
        // Update changed values PJuridica
        $pJuridica->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/p-juridicas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/p-juridicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPJuridica $request
     * @param PJuridica $pJuridica
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPJuridica $request, PJuridica $pJuridica)
    {
        $pJuridica->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPJuridica $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPJuridica $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('pJuridicas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

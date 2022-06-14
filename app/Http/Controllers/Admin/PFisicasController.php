<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PFisica\BulkDestroyPFisica;
use App\Http\Requests\Admin\PFisica\DestroyPFisica;
use App\Http\Requests\Admin\PFisica\IndexPFisica;
use App\Http\Requests\Admin\PFisica\StorePFisica;
use App\Http\Requests\Admin\PFisica\UpdatePFisica;
use App\Models\PFisica;
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

class PFisicasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPFisica $request
     * @return array|Factory|View
     */
    public function index(IndexPFisica $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PFisica::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['cpf', 'id', 'pessoa_id'],

            // set columns to searchIn
            ['cpf', 'id'],

            function ($query) use ($request) {
                $query->with(['pessoas']); //Relationship name
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

        return view('admin.p-fisica.index', ['data' => $data, 'pessoas' => Pessoa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.p-fisica.create');
        

        return view('admin.p-fisica.create', [
            'pessoas' => Pessoa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePFisica $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePFisica $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['pessoa_id'] = $request->getPessoaId();
        // Store the PFisica
        $pFisica = PFisica::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/p-fisicas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/p-fisicas');
    }

    /**
     * Display the specified resource.
     *
     * @param PFisica $pFisica
     * @throws AuthorizationException
     * @return void
     */
    public function show(PFisica $pFisica)
    {
        $this->authorize('admin.p-fisica.show', $pFisica);

        // TODO your code goes here
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PFisica $pFisica
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PFisica $pFisica)
    {
        $this->authorize('admin.p-fisica.edit', $pFisica);

        return view('admin.p-fisica.edit', [
            'pFisica' => $pFisica,
            'pessoas' => Pessoa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePFisica $request
     * @param PFisica $pFisica
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePFisica $request, PFisica $pFisica)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['pessoa_id'] = $request->getPessoaId();
        // Update changed values PFisica
        $pFisica->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/p-fisicas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/p-fisicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPFisica $request
     * @param PFisica $pFisica
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPFisica $request, PFisica $pFisica)
    {
        $pFisica->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPFisica $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPFisica $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('pFisicas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

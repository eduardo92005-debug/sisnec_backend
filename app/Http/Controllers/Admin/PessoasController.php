<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pessoa\BulkDestroyPessoa;
use App\Http\Requests\Admin\Pessoa\DestroyPessoa;
use App\Http\Requests\Admin\Pessoa\IndexPessoa;
use App\Http\Requests\Admin\Pessoa\StorePessoa;
use App\Http\Requests\Admin\Pessoa\UpdatePessoa;
use App\Models\Pessoa;
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

class PessoasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPessoa $request
     * @return array|Factory|View
     */
    public function index(IndexPessoa $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Pessoa::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['email', 'id', 'nome', 'telefone_1', 'telefone_2'],

            // set columns to searchIn
            ['email', 'id', 'nome', 'telefone_1', 'telefone_2']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pessoa.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pessoa.create');

        return view('admin.pessoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePessoa $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePessoa $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Pessoa
        $pessoa = Pessoa::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pessoas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pessoas');
    }

    /**
     * Display the specified resource.
     *
     * @param Pessoa $pessoa
     * @throws AuthorizationException
     * @return void
     */
    public function show(Pessoa $pessoa)
    {
        $this->authorize('admin.pessoa.show', $pessoa);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pessoa $pessoa
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Pessoa $pessoa)
    {
        $this->authorize('admin.pessoa.edit', $pessoa);


        return view('admin.pessoa.edit', [
            'pessoa' => $pessoa,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePessoa $request
     * @param Pessoa $pessoa
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePessoa $request, Pessoa $pessoa)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Pessoa
        $pessoa->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pessoas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pessoas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPessoa $request
     * @param Pessoa $pessoa
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPessoa $request, Pessoa $pessoa)
    {
        $pessoa->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPessoa $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPessoa $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('pessoas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}

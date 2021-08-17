<?php

namespace App\Http\Controllers;

use App\Models\ResProduct;
use Illuminate\Http\Request;
use App\Models\ResSalesTable;
use App\Http\Requests\ResSalesTableStoreRequest;
use App\Http\Requests\ResSalesTableUpdateRequest;

class ResSalesTableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ResSalesTable::class);

        $search = $request->get('search', '');

        $resSalesTables = ResSalesTable::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.res_sales_tables.index',
            compact('resSalesTables', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ResSalesTable::class);

        $resProducts = ResProduct::pluck('product_name', 'id');

        return view('app.res_sales_tables.create', compact('resProducts'));
    }

    /**
     * @param \App\Http\Requests\ResSalesTableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResSalesTableStoreRequest $request)
    {
        $this->authorize('create', ResSalesTable::class);

        $validated = $request->validated();

        $resSalesTable = ResSalesTable::create($validated);

        return redirect()
            ->route('res-sales-tables.index', $resSalesTable)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResSalesTable $resSalesTable)
    {
        $this->authorize('view', $resSalesTable);

        return view('app.res_sales_tables.show', compact('resSalesTable'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ResSalesTable $resSalesTable)
    {
        $this->authorize('update', $resSalesTable);

        $resProducts = ResProduct::pluck('product_name', 'id');

        return view(
            'app.res_sales_tables.edit',
            compact('resSalesTable', 'resProducts')
        );
    }

    /**
     * @param \App\Http\Requests\ResSalesTableUpdateRequest $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function update(
        ResSalesTableUpdateRequest $request,
        ResSalesTable $resSalesTable
    ) {
        $this->authorize('update', $resSalesTable);

        $validated = $request->validated();

        $resSalesTable->update($validated);

        return redirect()
            ->route('res-sales-tables.edit', $resSalesTable)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ResSalesTable $resSalesTable)
    {
        $this->authorize('delete', $resSalesTable);

        $resSalesTable->delete();

        return redirect()
            ->route('res-sales-tables.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

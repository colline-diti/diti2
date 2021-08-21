<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\StockTable;
use Illuminate\Http\Request;
use App\Models\ItemCategory;
use App\Http\Requests\StockTableStoreRequest;
use App\Http\Requests\StockTableUpdateRequest;

class StockTableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StockTable::class);

        $search = $request->get('search', '');

        $stockTables = StockTable::search($search)
            ->latest()
            ->paginate(5);

        return view('app.stock_tables.index', compact('stockTables', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StockTable::class);

        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');

        return view(
            'app.stock_tables.create',
            compact('itemCategories', 'units')
        );
    }

    /**
     * @param \App\Http\Requests\StockTableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockTableStoreRequest $request)
    {
        $this->authorize('create', StockTable::class);

        $validated = $request->validated();

        $stockTable = StockTable::create($validated);

        return redirect()
            ->route('stock-tables.index', $stockTable)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockTable $stockTable)
    {
        $this->authorize('view', $stockTable);

        return view('app.stock_tables.show', compact('stockTable'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StockTable $stockTable)
    {
        $this->authorize('update', $stockTable);

        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');

        return view(
            'app.stock_tables.edit',
            compact('stockTable', 'itemCategories', 'units')
        );
    }

    /**
     * @param \App\Http\Requests\StockTableUpdateRequest $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function update(
        StockTableUpdateRequest $request,
        StockTable $stockTable
    ) {
        $this->authorize('update', $stockTable);

        $validated = $request->validated();

        $stockTable->update($validated);

        return redirect()
            ->route('stock-tables.edit', $stockTable)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StockTable $stockTable)
    {
        $this->authorize('delete', $stockTable);

        $stockTable->delete();

        return redirect()
            ->route('stock-tables.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

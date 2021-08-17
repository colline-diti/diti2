<?php

namespace App\Http\Controllers\Api;

use App\Models\StockTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockTableResource;
use App\Http\Resources\StockTableCollection;
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
            ->paginate();

        return new StockTableCollection($stockTables);
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

        return new StockTableResource($stockTable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockTable $stockTable)
    {
        $this->authorize('view', $stockTable);

        return new StockTableResource($stockTable);
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

        return new StockTableResource($stockTable);
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

        return response()->noContent();
    }
}

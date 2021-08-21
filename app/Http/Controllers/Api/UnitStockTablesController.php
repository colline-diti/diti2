<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockTableResource;
use App\Http\Resources\StockTableCollection;

class UnitStockTablesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Unit $unit)
    {
        $this->authorize('view', $unit);

        $search = $request->get('search', '');

        $stockTables = $unit
            ->stockTables()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockTableCollection($stockTables);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit)
    {
        $this->authorize('create', StockTable::class);

        $validated = $request->validate([
            'item_name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'max:255'],
            'item_category_id' => ['required', 'exists:item_categories,id'],
            'remarks' => ['required', 'max:255', 'string'],
        ]);

        $stockTable = $unit->stockTables()->create($validated);

        return new StockTableResource($stockTable);
    }
}

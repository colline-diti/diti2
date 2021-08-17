<?php

namespace App\Http\Controllers\Api;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockTableResource;
use App\Http\Resources\StockTableCollection;

class ItemCategoryStockTablesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('view', $itemCategory);

        $search = $request->get('search', '');

        $stockTables = $itemCategory
            ->stockTables()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockTableCollection($stockTables);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('create', StockTable::class);

        $validated = $request->validate([
            'item_name' => ['required', 'max:255', 'string'],
            'unit' => ['required', 'max:255', 'string'],
            'buying_price' => ['required', 'max:255'],
            'quantity' => ['required', 'numeric'],
            'remarks' => ['required', 'max:255', 'string'],
        ]);

        $stockTable = $itemCategory->stockTables()->create($validated);

        return new StockTableResource($stockTable);
    }
}

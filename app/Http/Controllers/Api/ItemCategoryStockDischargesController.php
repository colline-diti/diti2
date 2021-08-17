<?php

namespace App\Http\Controllers\Api;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;

class ItemCategoryStockDischargesController extends Controller
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

        $stockDischarges = $itemCategory
            ->stockDischarges()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validate([
            'quantity_issued' => ['required', 'numeric'],
            'stock_table_id' => ['required', 'exists:stock_tables,id'],
            'res_section_id' => ['required', 'exists:res_sections,id'],
            'description' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
        ]);

        $stockDischarge = $itemCategory->stockDischarges()->create($validated);

        return new StockDischargeResource($stockDischarge);
    }
}

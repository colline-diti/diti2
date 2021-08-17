<?php

namespace App\Http\Controllers\Api;

use App\Models\ResSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;

class ResSectionStockDischargesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResSection $resSection)
    {
        $this->authorize('view', $resSection);

        $search = $request->get('search', '');

        $stockDischarges = $resSection
            ->stockDischarges()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResSection $resSection)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validate([
            'quantity_issued' => ['required', 'numeric'],
            'section' => ['required', 'max:255', 'string'],
            'stock_table_id' => ['required', 'exists:stock_tables,id'],
            'description' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
        ]);

        $stockDischarge = $resSection->stockDischarges()->create($validated);

        return new StockDischargeResource($stockDischarge);
    }
}

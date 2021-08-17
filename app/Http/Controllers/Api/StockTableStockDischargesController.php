<?php

namespace App\Http\Controllers\Api;

use App\Models\StockTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;

class StockTableStockDischargesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, StockTable $stockTable)
    {
        $this->authorize('view', $stockTable);

        $search = $request->get('search', '');

        $stockDischarges = $stockTable
            ->stockDischarges()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StockTable $stockTable)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validate([
            'quantity_issued' => ['required', 'numeric'],
            'section' => ['required', 'max:255', 'string'],
            'res_section_id' => ['required', 'exists:res_sections,id'],
            'description' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
        ]);

        $stockDischarge = $stockTable->stockDischarges()->create($validated);

        return new StockDischargeResource($stockDischarge);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StockDischarge;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;

class StockDischargeStockDischargesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('view', $stockDischarge);

        $search = $request->get('search', '');

        $stockDischarges = $stockDischarge
            ->stockDischarges()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validate([
            'quantity_issued' => ['required', 'numeric'],
            'res_section_id' => ['required', 'exists:res_sections,id'],
            'description' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
        ]);

        $stockDischarge = $stockDischarge
            ->stockDischarges()
            ->create($validated);

        return new StockDischargeResource($stockDischarge);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;

class UserStockDischargesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $stockDischarges = $user
            ->stockDischarges()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validate([
            'quantity_issued' => ['required', 'max:255'],
            'stock_table_id' => ['required', 'exists:stock_tables,id'],
            'unit_id' => ['required', 'exists:units,id'],
            'res_section_id' => ['required', 'exists:res_sections,id'],
            'return_date' => ['required', 'date'],
            'remarks' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
        ]);

        $stockDischarge = $user->stockDischarges()->create($validated);

        return new StockDischargeResource($stockDischarge);
    }
}

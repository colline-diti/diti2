<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\StockDischarge;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockDischargeResource;
use App\Http\Resources\StockDischargeCollection;
use App\Http\Requests\StockDischargeStoreRequest;
use App\Http\Requests\StockDischargeUpdateRequest;

class StockDischargeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StockDischarge::class);

        $search = $request->get('search', '');

        $stockDischarges = StockDischarge::search($search)
            ->latest()
            ->paginate();

        return new StockDischargeCollection($stockDischarges);
    }

    /**
     * @param \App\Http\Requests\StockDischargeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockDischargeStoreRequest $request)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validated();

        $stockDischarge = StockDischarge::create($validated);

        return new StockDischargeResource($stockDischarge);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('view', $stockDischarge);

        return new StockDischargeResource($stockDischarge);
    }

    /**
     * @param \App\Http\Requests\StockDischargeUpdateRequest $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function update(
        StockDischargeUpdateRequest $request,
        StockDischarge $stockDischarge
    ) {
        $this->authorize('update', $stockDischarge);

        $validated = $request->validated();

        $stockDischarge->update($validated);

        return new StockDischargeResource($stockDischarge);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('delete', $stockDischarge);

        $stockDischarge->delete();

        return response()->noContent();
    }
}
